<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
   
        <!-- plugins:css -->
        @include('admin.css')
  </head>
  <body>
    
  <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper" >
          <div class="container"  style="padding-top:50px;color:white;margin-left:-75px;">
        <table class="table table-striped">
        <thead>

       
          <tr style="background-color: green;">
            <th style="color:white;">Nom de patient</th>
            <th style="color:white;">N°Tél</th>
            <th style="color:white;">nom de docteur</th>
            <th style="color:white;">date de la demande</th>
           <th  style="color:white;">message</th>
            <th style="color:white; padding-left: 50px;">état</th>
            <th style="color:white; padding-left: 10px;">décision</th>
            <th style="color:white; padding-left: 10px;">Envoyer Email</th>
          </tr>
          </thead>
          <tbody>
          @foreach($RD as $RDadmin)
          
         
          <tr>
        
           <td style="color:white;">{{$RDadmin->name}}</td>
           <td style="color:white;">{{$RDadmin->phone}}</td>
           <td style="color:white;">{{$RDadmin->doctor}}</td>
           <td style="color:white;">{{$RDadmin->date}}</td>
           <td style="color: white; word-break: break-word; max-width: 350px; white-space: pre-wrap;">{{$RDadmin->message}}</td>
           <td style="color:white;">
           @if ($RDadmin->status=='demande acceptée')
           <span  class="badge badge-success">{{$RDadmin->status}} </span>
          @elseif($RDadmin->status=='demande refusée')
          <span  class="badge badge-danger">{{$RDadmin->status}} </span>
          @else
          <span   class="badge badge-warning">{{$RDadmin->status}} </span>
          @endif
         
          </td>
           <td><a href="{{url('validate_RD',$RDadmin->id)}}"><i class="fa-solid fa-circle-check fa-beat-fade fa-xl" style="color: #25d45a;padding-bottom:15px;padding-right:20px;">
        </i> </a><a href="{{url('cancel_RD',$RDadmin->id)}}"> <i class="fa-regular fa-rectangle-xmark fa-beat fa-xl" style="color: #e2081e; " onclick="return confirm('etes-vous sur d annuler cette demande')"></i></a>
      </td>
      
      <td><a href="{{url('emailview',$RDadmin->id)}}"><i class="fa-solid fa-envelope fa-shake fa-2xl" style="color: #b4841d;margin-left:25px;padding-bottom:15px;"></i>
      </td>
          </tr>
                                                    
          @endforeach
          </tbody>    
        
        
      </table>
        </div>
        </div>
        </div>
          <!-- partial -->
       
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.scripts')
    <!-- End custom js for this page -->
  </body>
</html>