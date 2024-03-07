<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >

    <title>Document</title>
</head>
 <body>


 <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Balance</th>
                    <th>Created_at</th>
                    <th>Updated_at</th>
                </tr>
            </thead>
            <tbody>
                            @foreach ($user as $user )

                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->balance }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->updated_at }}</td>
                    <td>
                         <button type="submit" class="btn btn-success btn-sm">
                         <a href="{{ route('transactions.edit',$user->id) }}" style="color: white ;text-decoration: none;">change balance </a></button>
                    </td>
                    <td>
                    <button type="submit" class="btn btn-danger btn-sm">
                         <a href="{{ route('make.zero',$user->id) }}" style="color: white ;text-decoration: none;">make balance Zero </a></button>
                    </td>
                    @endforeach
                </tr>
            </tbody>

        </table>


</body>
</html>
