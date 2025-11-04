 <div class="navbar-wrapper">
     <div class="m-header py-3">
         <a class="gap-3 d-flex align-items-center b-brand text-primary">
             <!-- ========   Change your logo from here   ============ -->
             <img src="{{ asset('assets/images/antrek.png') }}" class="img-fluid logo-lg" width="30" alt="logo">
            <h4 class="mt-2">Jurnal Guru</h4>
         </a> 
     </div>
     <div class="navbar-content">
         <ul class="pc-navbar">
             <li class="pc-item">
                 <a href="{{ auth()->user()->hasRole('admin')? '/admin/dashboard': '/teacher/dashboard' }}" class="pc-link">
                     <span class="pc-micon"><i class="ti ti-dashboard"></i></span>
                     <span class="pc-mtext">Dashboard</span>

                 </a>
             </li>
@if (auth()->user()->hasRole('admin'))
      <li class="pc-item">
                 <a href="{{ route('teacher-confirmations') }}" class="pc-link">
                     <span class="pc-micon"><i class="ti ti-dashboard"></i></span>
                     <span class="pc-mtext">Konfirmasi</span>

                 </a>
             </li>
             @elseif (auth()->user()->hasRole('teacher'))
               <li class="pc-item">
                 <a href="../dashboard/index.html" class="pc-link">
                     <span class="pc-micon"><i class="ti ti-dashboard"></i></span>
                     <span class="pc-mtext">Absen</span>

                 </a>
             </li>
@endif
          
         </ul>
      
     </div>
 </div>
