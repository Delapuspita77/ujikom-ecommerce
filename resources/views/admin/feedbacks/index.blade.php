@extends('layouts.admin')

@section('title', 'Manage Feedbacks')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Feedbacks</h1>

    @if($feedbacks->isEmpty())
        <p>No feedback found.</p>
    @else
        <table class="w-full border border-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border px-3 py-2">User</th>
                    <th class="border px-3 py-2">Product</th>
                    <th class="border px-3 py-2">Rating</th>
                    <th class="border px-3 py-2">Comment</th>
                    <th class="border px-3 py-2">Created</th>
                    <th class="border px-3 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($feedbacks as $feedback)
                    <tr>
                        <td class="border px-3 py-2">{{ $feedback->user->name ?? '-' }}</td>
                        <td class="border px-3 py-2">{{ $feedback->product->name ?? '-' }}</td>
                        <td class="border px-3 py-2">{{ $feedback->rating }} / 5</td>
                        <td class="border px-3 py-2">{{ $feedback->comment }}</td>
                        <td class="border px-3 py-2">{{ $feedback->created_at->format('d M Y H:i') }}</td>
                        <td class="border px-3 py-2">
                            <form action="{{ route('admin.feedbacks.destroy', $feedback->id) }}" 
                                  method="POST" onsubmit="return confirm('Delete feedback?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
