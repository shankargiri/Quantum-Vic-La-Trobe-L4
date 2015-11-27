<?php if (Session::get('success')): ?>
    <div class="alert alert-success flash-msg">
        {{Session::get('success')}}    
    </div>
<?php endif ?>

<?php if (Session::get('warning')): ?>
    <div class="alert alert-warning flash-msg">
        {{Session::get('warning')}}    
    </div>
<?php endif ?>

<?php if (Session::get('error')): ?>
    <div class="alert alert-danger flash-msg">
        {{Session::get('error')}}
    </div>
<?php endif ?>