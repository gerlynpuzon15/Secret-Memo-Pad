<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
    <style>
        /* Custom CSS for the table */
        body, html {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        .recipe-table {
            width: 100%;
            border-collapse: collapse;
        }

        .recipe-table th,
        .recipe-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .recipe-table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .recipe-table td {
            background-color: #fff;
        }

        .recipe-table td img {
            max-width: 100px;
            height: auto;
        }

        .recipe-table td.actions {
            white-space: nowrap;
        }

        .recipe-table td.actions a {
            display: inline-block;
            margin-right: 5px;
            padding: 8px 12px;
            border: 1px solid transparent;
            border-radius: 4px;
            text-decoration: none;
            color: #fff;
        }

        .recipe-table td.actions a.btn-warning {
            background-color: #ffc107;
        }

        .recipe-table td.actions a.btn-danger {
            background-color: #dc3545;
        }

        .recipe-table td.actions a:hover {
            opacity: 0.8;
        }
    </style>
</head>

<body class="fix-header fix-sidebar card-no-border">
    <div id="main-wrapper">
        @include('admin.header')
        @include('admin.sidebar')
        <div class="page-wrapper">
            <div class="container">
                <div class="recipe-table">
                    <table>
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Notes</th>
                                <th>Actions</th>
                                <th>Date Created</th>
                                <th>Date Updated</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $data)
                            <tr>
                                <td>{{$data->title}}</td>
                                <td>{{$data->note}}</td>
                                <td class="actions">
                                    <a href="{{url('deletenote', $data->id)}}" onclick="return confirm('Are you sure you want to delete this')" class="btn btn-danger">Delete</a>
                                    <a href="{{url('updatenote', $data->id)}}" class="btn btn-warning">Update</a>
                                </td>
                                <td>{{$data->created_at}}</td>
                                <td>{{$data->updated_at}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
