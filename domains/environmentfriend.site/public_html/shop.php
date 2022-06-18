
<?php $scriptList = array('js/jquery3.3.js', 'js/ShowHide.js', 'js/Cart.js', 'js/Reviews.js', 'js/ProductPhotoChange.js', 'js/cleaningTips.js');
    include("header.php"); include("addReviewForm.php");?>

<main>

    <h2>Shop</h2>
    <p id="supportStatement"><b>If you would like to support us, here are some environmentally friendly products you could add to your collection :).</b></p>



    <section>
<div class="product" id="bambooStraws">
    <h3 class="itemTitle">10x Bamboo Drinking Straws</h3>
 
    <img src="images/BambooStrawsMain.jpg" id="mainImg">
    <img src="images/BambooStrawsMain.jpg">
    <img src="images/BambooStrawsAndBrush.jpg">
    <img src="images/strawsEnds.jpeg">

    $<span class="price">9.99</span>

    <button name="addStrawsToCart" class="buy">Add To Cart</button>
    <button name="buyStraws" id="buyStraws" value="Buy Now"class="buy" onclick="window.location.href='checkout.php'">Buy NOW</button>

    <article>
        <p><strong>Get in now on the new trend!</strong></p>
        <p>Bamboo straws feel and look spectacular. Help <strong>get rid of the millions of plastic straws</strong> that are polluting our oceans and land.</p>
        <p>Our bamboo straws are very <strong>durable</strong> and <strong>easy to store</strong>. Take them with you wherever you go so that you never need to use another plastic straw.</p>
        <p>Our straws are completely Eco-Friendly! They are <strong>100% Biodegradable</strong> and <strong>Compostable</strong>; their components will break down into smaller particles and nutrients when left in the environment.</p>
        <p>They can be <strong>reused</strong> many times and will <strong>last several months</strong> if cared for.</p>

        <div id="cleaningTips"><h4>Cleaning Tips</h4></div>
    </article>

    <!-- Maybe change how we word the h4 above.<p>For advice on caring for them, check out our cleaning advice here.</p>-->

    <p>Length: 19.5cm. Inner diameter: 4-5mm. </p>

</div>
    </section>



    <section>
<se class="product" id="toothbrushes">
    <img src="images/68560905_2398027333809223_7052223806248583168_n.jpg">
    <img src="images/68560905_2398027333809223_7052223806248583168_n.jpg">
    <h3 class="itemTitle">Bamboo Toothbrush</h3>
    $<span class="price">3.99</span>
    <button id="addBrushesToCart" class="buy">Add To Cart</button>
    <button id="buyBrushes" class="buy" onclick="window.location.href='checkout.php'">Buy Now</a></button>
    <article>

    </article>
    </section>



</div>
</main>


        <footer>
            <?php include("footer.php"); ?>
        </footer>

    </body>
</html>