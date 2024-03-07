
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
 <div class="container">
   <div class="row">
    <div class="col-md-10">
       <div class="col-md-10">
                  <div class="col-md-10" style="text-align: center">
                         <h3>name ({{ $userbalance->name }})</h3>
                         <h3>Old Balance : ({{ $userbalance->balance }})</h3>
                  </div>
        <form method="post" action="{{ route('transactions.update',$userbalance->id) }}" >
           @method('put')
              @csrf



                   <div class="form-group mb-3">
                      <label for="balance">Add balance</label>
                            <div>
                              <input type="text" class="form-control" name="balance"  >
                            </div>
                    </div>
                   <div class="form-group mb-3">
                       <label for="inbalance">Increas</label>
                       <div>
                         <input type="text" class="form-control" name="inbalance"  >
                       </div>
                   </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary mt-3"> Save Updated</button>
              </div>
         </form>
    </div>

      <div class="col-md-10">

<hr>
<h1> transfare from user</h1>

 <form action="{{ route('balance.to',$userbalance->id) }}" method="post">
    @method('put')
    @csrf
               <div class="form-group mb-3">
                   <label for="balance">Add balance</label>
                      <div>
                         <input type="text" class="form-control" name="balance"  >
                     </div>
                  <select class="form-select" aria-label="Default select example" name="from" >
                              <option selected>from user</option>
                                      @foreach ($user as $user )
                            <option value="{{ $user->id }}" > {{ $user->name }} / Balance : {{ $user->balance }}</option>
                                                    @endforeach
                 </select>
            <div class="form-group">
              <button type="submit" class="btn btn-primary mt-3"> Save Updated</button>
            </div>

</form>
</div>
</div>
</div>
 </div>


</body>
</html>
