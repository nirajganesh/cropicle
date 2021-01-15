<style>
    .wrapper.error{
        text-align:center;
        padding:8rem 0;
    }
    .h1{
        font-size:8rem;
        font-weight:800;
        color:#555;
    }
    .h3{
        font-size:3rem;
        font-weight:600;
        margin:1rem 0 2rem;
        color:#555;
    }
    a.track{
        cursor:pointer;
        padding:1.5rem 3rem;
        background-color:rgb(66, 133, 244);
        color:white;
        font-size:2rem;
        font-weight:600;
        display:inline-block;
        transition:0.2s;
    }
    a.track:hover{
        opacity:0.8;
    }

</style>

<section>
    <div class="wrapper error">
        <h1 class="h1">404</h1>
        <h3 class="h3"> Looks like you are lost ! </h3>
        <a class="track" onclick="window.history.back()">←&nbsp; Let's get you back on track</a>
    </div>
</section>