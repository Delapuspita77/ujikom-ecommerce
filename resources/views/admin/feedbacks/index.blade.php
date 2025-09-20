@extends('layouts.admin')

@section('title', 'Manage Feedbacks')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Feedbacks</h1>

    <table class="w-full border border-gray-300">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-3 py-2">ID</th>
                <th class="border px-3 py-2">User</th>
                <th class="border px-3 py-2">Message</th>
                <th class="border px-3 py-2">Created At</th>
            </tr>
        </thead>
        <tbody>
            @forelse($feedbacks as $feedback)
                <tr>
                    <td class="border px-3 py-2">{{ $feedback->id }}</td>
                    <td class="border px-3 py-2">{{ $feedback->user->name }}</td>
                    <td class="border px-3 py-2">{{ $feedback->message }}</td>
                    <td class="border px-3 py-2">{{ $feedback->created_at->format('d M Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="border px-3 py-2 text-center">No feedback found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
