<div class="box-menu-contact">
   <div class="box-content-menu-contact">
      <div class="line-title-menu">CHACO GUIDE CENTER</div>
      <div class="line-content-menu">
         <a href="{{route('shipping-info')}}" class="menu-contact-item @if($type == 0) active-menu-contact @endif">Shipping </br> Information</a>
         <a href="{{route('easy-free-returns')}}" class="menu-contact-item @if($type == 1) active-menu-contact @endif">Returns & </br> Exchanges</a>
         <a href="{{route('account')}}" class="menu-contact-item @if($type == 2) active-menu-contact @endif">Account</a>
         <a href="{{route('order-status')}}" class="menu-contact-item @if($type == 4) active-menu-contact @endif">Order Status</a>
         <a href="{{route('faq')}}" class="menu-contact-item @if($type == 3) active-menu-contact @endif">FAQ</a>
      </div>
   </div>
</div>
