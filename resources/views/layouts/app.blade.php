<!DOCTYPE html>
<html data-navigation-type="default" data-navbar-horizontal-shape="default" lang="en-US" dir="ltr">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
    @include('layouts.head')
<body>
    
    <main class="main" id="top">

        @if(Auth::guard('web')->user())
            @include('layouts.headers.client') 
        @elseif(Auth::guard('admin')->user())
            @include('layouts.sidbares.admin')
        @elseif(Auth::guard('magasin')->user())
            @include('layouts.sidbares.magasin')
        @elseif(Auth::guard('agent')->user())
            @include('layouts.sidbares.magasin')
        @endif


        @if(Auth::guard('admin')->user())
            @include('layouts.headers.admin')
        @elseif(Auth::guard('magasin')->user())
            @include('layouts.headers.magasin')
        @elseif(Auth::guard('agent')->user())
            @include('layouts.headers.agent')
        @endif
        

        @section('main-content')
        
        @show

        @include('layouts.footer')
    </main>
     
        @include('layouts.js')

</body>
</html>