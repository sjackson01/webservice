<!doctype html>
<html lang="en">
    @include('includes.head')
    <!-- START body -->
    <body style="background-color:#304ffe">
        @include('includes.nav')
        <!-- START Cards -->
        <div class="container">
            <div class="row">
            @include('includes.displaydb')
            </div>    
        </div>   
        <!-- End Cards --> 
        @include('includes.footer')
    </body> 
    <!-- END Body -->
</html>