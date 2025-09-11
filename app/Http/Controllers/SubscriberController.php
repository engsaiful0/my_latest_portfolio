<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Subscriber::query();

        // Apply filters
        if ($request->filled('status')) {
            $query->where('is_active', $request->status === 'active');
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('email', 'like', "%{$search}%")
                  ->orWhere('name', 'like', "%{$search}%");
            });
        }

        if ($request->filled('date_from')) {
            $query->whereDate('subscribed_at', '>=', $request->date_from);
        }

        if ($request->filled('date_to')) {
            $query->whereDate('subscribed_at', '<=', $request->date_to);
        }

        // Handle export
        if ($request->has('export')) {
            return $this->exportSubscribers($query, $request->export);
        }

        $subscribers = $query->orderBy('created_at', 'desc')->paginate(15);
        return view('admin.subscribers.index', compact('subscribers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.subscribers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribers,email',
            'name' => 'nullable|string|max:255',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');
        $data['subscribed_at'] = now();

        Subscriber::create($data);

        return redirect()->route('admin.subscribers.index')
            ->with('success', 'Subscriber created successfully.');
    }

    /**
     * Store a new subscriber from frontend.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribers,email',
            'name' => 'nullable|string|max:255'
        ]);

        Subscriber::create([
            'email' => $request->email,
            'name' => $request->name,
            'is_active' => true,
            'subscribed_at' => now()
        ]);

        return response()->json(['success' => true, 'message' => 'Thank you for subscribing!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subscriber = Subscriber::findOrFail($id);
        return view('admin.subscribers.show', compact('subscriber'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subscriber = Subscriber::findOrFail($id);
        return view('admin.subscribers.edit', compact('subscriber'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $subscriber = Subscriber::findOrFail($id);
        
        $request->validate([
            'email' => 'required|email|unique:subscribers,email,' . $id,
            'name' => 'nullable|string|max:255',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        $subscriber->update($data);

        return redirect()->route('admin.subscribers.index')
            ->with('success', 'Subscriber updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subscriber = Subscriber::findOrFail($id);
        $subscriber->delete();

        return redirect()->route('admin.subscribers.index')
            ->with('success', 'Subscriber deleted successfully.');
    }

    /**
     * Toggle subscriber status.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function toggleStatus($id)
    {
        $subscriber = Subscriber::findOrFail($id);
        $subscriber->is_active = !$subscriber->is_active;
        $subscriber->save();

        return redirect()->back()
            ->with('success', 'Subscriber status updated successfully.');
    }

    /**
     * Export subscribers to CSV or Excel.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string  $format
     * @return \Illuminate\Http\Response
     */
    private function exportSubscribers($query, $format)
    {
        $subscribers = $query->get();
        
        if ($format === 'csv') {
            $filename = 'subscribers_' . now()->format('Y-m-d_H-i-s') . '.csv';
            
            $headers = [
                'Content-Type' => 'text/csv',
                'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            ];

            $callback = function() use ($subscribers) {
                $file = fopen('php://output', 'w');
                
                // Add CSV headers
                fputcsv($file, ['ID', 'Email', 'Name', 'Status', 'Subscribed At', 'Created At']);
                
                // Add data rows
                foreach ($subscribers as $subscriber) {
                    fputcsv($file, [
                        $subscriber->id,
                        $subscriber->email,
                        $subscriber->name ?? 'N/A',
                        $subscriber->is_active ? 'Active' : 'Inactive',
                        $subscriber->subscribed_at->format('Y-m-d H:i:s'),
                        $subscriber->created_at->format('Y-m-d H:i:s')
                    ]);
                }
                
                fclose($file);
            };

            return response()->stream($callback, 200, $headers);
        }
        
        // For Excel export, you would need to install a package like Laravel Excel
        // For now, we'll return a simple CSV
        return $this->exportSubscribers($query, 'csv');
    }
}
