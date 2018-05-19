<?php $colors = ['#007bff', '#6610f2', '#e83e8c', '#dc3545', '#fd7e14', '#20c997'] ?>

@foreach($title as $item)
    <div class="sg-project-label badge badge-pill badge-success" style="background-color: #20c997">{{ $item }}</div>
@endforeach