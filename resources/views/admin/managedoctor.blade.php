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
          <div class="container"  style="padding-top:20px;color:white;">
        <table class="table table-striped">
        <thead>
          <tr style="background-color: green;">
            <th style="color:white;">Nom de docteur</th>
            <th style="color:white;">N°Tél</th>
            <th style="color:white;">N° chambre</th>
            <th style="color:white; padding-left: 40px;">Specialité</th>
            <th style="color:white; padding-left: 30px;">images</th>
            <th style="color:white; padding-left: 40px;">décision</th>
          </tr>
          @foreach($doctor as $doctors)
          <tbody>
         
          <tr>
        
           <td style="color:white;">{{$doctors->name}}</td>
           <td style="color:white;">{{$doctors->phone}}</td>
           <td style="color:white;">{{$doctors->room}}</td>
           <td style="color:white;">{{$doctors->speciality}}</td>
           <td style="color:white;"><img src="doctorimage/{{$doctors->image}}" style="width:74px;height:74px;"></td>
           <td><a href="{{url('updatedoctor',$doctors->id)}}"><i class="fa-solid fa-pen fa-beat" style="color: #276286; font-size:24px; padding-left:20px; padding-right:20px;"></i>
      </a><a href="{{url('cancel_doctor',$doctors->id)}}"> <i class="fa-regular fa-rectangle-xmark fa-beat fa-xl" style="color: #e2081e;font-size:27px;" onclick="return confirm('etes-vous sur d annuler cette demande')"></i></a></td>
          
          </tr>
          </tbody>                                               
          @endforeach
        </thead>
        
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