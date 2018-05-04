<style type="text/css">
    @keyframes stroke-animation
    {
        from   { stroke-dashoffset: 2000; }
        to  { stroke-dashoffset: 0; }
    }

    @-webkit-keyframes stroke-animation /* Safari 与 Chrome */
    {
        from   { stroke-dashoffset: 2000; }
        to  { stroke-dashoffset: 0; }
    }
    .sg-project-intro-shape {
        stroke: #fbb03b;
        stroke-width: 10;
        stroke-dasharray: 2000;
    }
    .sg-project-intro-text {
        font-size:46px;
        fill: #fbb03b
    }
    .sg-project-intro-shape:hover {
        animation: stroke-animation 2s;
        -webkit-animation: stroke-animation 2s;
    }
</style>
@foreach($title as $item)
    <svg class="sg-project-intro-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 825.99 140" width="500">
        <title>多边形</title>
        <polygon class="sg-project-intro-shape" points="15, 65 65, 15 750, 15 800, 65 750, 115 65, 115 15, 65 65, 15"></polygon>
        <text class="sg-project-intro-text" text-anchor="middle" x="50%" y="55%">{{ $item }}</text>
    </svg>
@endforeach