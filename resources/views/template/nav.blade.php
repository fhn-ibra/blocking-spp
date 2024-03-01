<li class="nav-item @if ($title == 'Spp') {{ 'active' }} @endif">

    <a href="{{ url('pembayaran') }}" class="nav-link">
        <i class="fas fa-fw fa-cube"></i>
        <span>Spp</span>
    </a>
</li>

@if(Auth::user()->level == 'admin')
<li class="nav-item @if ($title == 'Akun') {{ 'active' }} @endif">

    <a href="{{ url('akun') }}" class="nav-link">
        <i class="fas fa-fw fa-users"></i>
        <span>Akun</span>
    </a>
</li>
@endif