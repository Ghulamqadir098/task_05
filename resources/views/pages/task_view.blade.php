@extends('layout.layout')
@section('content')
    <div class="main-body">


        <table class="table bg-success">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Status</th>
                    <th scope="col">Update Status</th>

                </tr>
            </thead>
            <tbody>
                @if ($task->isEmpty())
                    <tr>
                        <td colspan="4" class="text-center">I'm sorry, you don't have any task assigned yet!</td>
                    </tr>
                @else
                    @foreach ($task as $item)
                        <tr>
                            <th scope="row">{{ $item->title }}</th>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->status }}</td>
                            <td>
                                <div class="mb-3">
                                   
                                    <select name="status" class="status-update form-control" data-id="{{ $item->id }}" required>
                                        <option value="pending" {{ $item->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="in_progress" {{ $item->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                        <option value="completed" {{ $item->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
            
        </table>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.status-update').change(function() {
                    var status = $(this).val();
                    var taskId = $(this).data('id');
        
                    $.ajax({
                        url: '/task/update', // Route to handle the update
                        method: 'PUT',
                        data: {
                            _token: '{{ csrf_token() }}', // Laravel CSRF protection
                            id: taskId,
                            status: status
                        },
                        success: function(response) {
                            if (response.success) {
                                alert('Status updated successfully!');
                            } else {
                                alert('Failed to update status.');
                            }
                        },
                        error: function() {
                            alert('An error occurred. Please try again.');
                        }
                    });
                });
            });
        </script>
    </div>
@endsection
