<?php
require('layouts/header.php');
?>

<main role="main">
    <div class="container-fluid m-3">
       <div class="row single-blog">
           <div class="col-md-9 single-blog-text">
               <div class="single-blog-header-text">
               </div>
               <p>
                   Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ac quam sapien. Nunc risus lacus, suscipit at consequat ac, hendrerit bibendum augue. Vivamus et tellus nunc. Nulla mollis porta ante et suscipit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Donec nunc nulla, fermentum at dictum id, dapibus in elit. Sed eu efficitur justo, vitae hendrerit enim. Donec risus dui, hendrerit eget ex ac, consequat feugiat odio. Praesent tellus augue, cursus eget mollis ac, pretium vel tellus. Proin blandit ut erat vitae pharetra. Pellentesque tristique nisl tortor. Vivamus laoreet nisl justo, in porttitor leo rutrum ut. Ut ut nisl quis felis tincidunt blandit. Aenean non tempor sapien. Pellentesque elit felis, placerat sed congue convallis, rhoncus ac tellus. Curabitur vitae lorem sed mauris commodo efficitur. Pellentesque tempor, orci eget scelerisque egestas, sapien massa molestie felis, eu consequat mauris metus quis ante. Vestibulum ultricies nunc sed purus sollicitudin hendrerit. Sed nec volutpat dolor. In hac habitasse platea dictumst. Duis finibus erat ullamcorper nisi porttitor sodales. Curabitur dapibus, ex ut accumsan congue, mi est pellentesque lectus, vel porta diam tortor et dui. Suspendisse iaculis diam eget ultricies ornare. Vivamus eget iaculis mi. Aenean eget quam ut sem mollis condimentum. Donec nec molestie nisi.
                  <a href="singlepost.php?id=">....</a>
               </p>
           </div>
           <div class="col-md-3 single-blog-image">
               <img src="https://via.placeholder.com/350x150" alt="">
           </div>
           <div class="single-blog-footer-text clearfix">
               <div class="pull-left">Author</div>
               <div class="pull-right">Comments</div>
           </div>
       </div>
    </div>
    <div class="container">

        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>
    </div>


</main>


<?php
require('layouts/footer.php');
?>