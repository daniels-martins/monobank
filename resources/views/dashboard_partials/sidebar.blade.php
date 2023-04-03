<nav class="sidebar sidebar-offcanvas" id="sidebar">
   <ul class="nav">
       <li class="nav-item">
           <a class="nav-link" href="{{ route('dashboard') }}">
               <i class="mdi mdi-grid-large menu-icon"></i>
               <span class="menu-title">Dashboard</span>
           </a>
       </li>
       <li class="nav-item nav-category">Transfer</li>
       <li class="nav-item">
           <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
               aria-controls="ui-basic">
               <i class="menu-icon mdi mdi-forward"></i>
               <span class="menu-title">Transfer</span>
               <i class="menu-arrow"></i>
           </a>
           <div class="collapse" id="ui-basic">
               <ul class="nav flex-column sub-menu">
                   <li class="nav-item">
                       <a class="nav-link" href="{{ route('payments.create', ['transfer_type' => 'local']) }}">Domestic</a>
                   </li>
                   <li class="nav-item">
                       <a class="nav-link" href="{{ route('payments.create', ['transfer_type' => 'foreign']) }}">International</a>
                   </li>
               </ul>
           </div>
       </li>
       <li class="nav-item">
         <a class="nav-link"
             href="{{ route('accounts.create') }}">
             <i class="menu-icon mdi mdi-plus"></i>
             <span class="menu-title">Add a New Account</span>
         </a>
     </li>


     <li class="nav-item">
      <a class="nav-link"
          href="{{ route('accounts.index') }}">
          <i class="menu-icon mdi mdi-eye"></i>
          <span class="menu-title">View Accounts</span>
      </a>
  </li>

  <li class="nav-item">
   <a class="nav-link"
       href="{{ route('profile.edit') }}">
       <i class="menu-icon mdi mdi-pen"></i>
       <span class="menu-title">Edit Personal Data</span>
   </a>
</li>
   </ul>
</nav>