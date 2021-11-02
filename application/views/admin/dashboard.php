 <div class="page-title-box">
     <div class="row align-items-center">

         <div class="col-sm-6">
             <h4 class="page-title">Dashboard</h4>
         </div>
         <div class="col-sm-6">
             <ol class="breadcrumb float-right">
                 <div id="clock"></div>
             </ol>
         </div>
         <script type="text/javascript">
             function showTime() {
                 var a_p = "";
                 var today = new Date();
                 var curr_hour = today.getHours();
                 var curr_minute = today.getMinutes();
                 var curr_second = today.getSeconds();
                 if (curr_hour < 12) {
                     a_p = "AM";
                 } else {
                     a_p = "PM";
                 }
                 if (curr_hour == 0) {
                     curr_hour = 12;
                 }
                 if (curr_hour > 12) {
                     curr_hour = curr_hour - 12;
                 }
                 curr_hour = checkTime(curr_hour);
                 curr_minute = checkTime(curr_minute);
                 curr_second = checkTime(curr_second);
                 document.getElementById('clock').innerHTML = curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
             }

             function checkTime(i) {
                 if (i < 10) {
                     i = "0" + i;
                 }
                 return i;
             }
             setInterval(showTime, 500);
         </script>


     </div> <!-- end row -->
 </div>
 <!-- end page-title -->

 <div class="row">
     <div class="col-12">
         <div class="card m-b-30">
             <div class="card-body">
                 <div class="alert alert-primary alert-dismissible fade show" role="alert">
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">×</span>
                     </button> <i class="mdi mdi-account-multiple-outline"></i>
                     <strong>Selamat datang!</strong> Anda login sebagai admin.
                 </div>
                 <div class="row">
                     <div class="col-sm-6 col-xl-3">
                         <div class="card">
                             <div class="card-heading p-4">
                                 <div class="mini-stat-icon float-right">
                                     <i class="mdi mdi-newspaper bg-warning text-white"></i>
                                 </div>
                                 <div>
                                     <h5 class="font-16">Blog</h5>
                                 </div>
                                 <h3 class="mt-4">1</h3>
                             </div>
                         </div>
                     </div>

                 </div>
             </div>
         </div>
     </div> <!-- end col -->
 </div> <!-- end row -->