const slider1 = document.getElementById("glide1");

if(slider1)
   new Glide(slider1, {
   type: "carousel",
   startAt: 0,
   autoPlay: true,
   hoverpause: true,
   perView: 1,
   animationDuration: 800,
   animationTimingFunc: "linear",
}).mount();


const getProducts = async () => {
   const res = await fetch("./");
   const data = await res.json();
   const products = data.products;
   return products;
 };
 
 // Display Product
 const displayProducts = (products, center) => {
   let display = products.map(
     ({ title, image, price }) => `<div class="product">
           <div class="product-header">
             <img src=${image} alt="product">
           </div>
           <div class="product-footer">
             <h3>${title}</h3>
             <div class="rating text-warning">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="far fa-star"></i>
             </div>
             <div class="product-price">
               <h4>&#8377 ${price}</h4>
             </div>
           </div>
           <ul>
             <li>
               <a href="#">
                 <i class="fas fa-shopping-cart"></i>
               </a>
             </li>
             <li>
               <a href="#">
                 <i class="far fa-heart"></i>
               </a>
             </li>
             
           </ul>
         </div>`
   );
 
   display = display.join("");
   center.innerHTML = display;
 };
 
 // Filtering
 const catContainer = document.querySelector(".sort-category");
 const filterBtns = [...document.querySelectorAll(".filter-btn")];
 
 if (catContainer) {
   catContainer.addEventListener("click", async e => {
     const target = e.target.closest(".section-title");
     if (!target) return;
     const id = target.dataset.id;
     const products = await getProducts();
 
     if (id) {
       filterBtns.forEach(btn => {
         btn.classList.remove("active");
       });
       target.classList.add("active");
       const menuCat = products.filter(product => product.category === id);
       productCenter.classList.add("animate__animated", "animate__backInUp");
       setTimeout(() => {
         productCenter.classList.remove(
           "animate__animated",
           "animate__backInUp"
         );
       }, 1000);
       displayProducts(menuCat, productCenter);
     }
   });
 }
 
 const productCenter = document.querySelector(".product-center");
 const specialCenter = document.querySelector(".special-center");
 const recentCenter = document.querySelector(".recent-center");
 const shopCenter = document.querySelector(".shop-center");
 
 const filterArray = async type => {
   const products = await getProducts();
   return products.filter(product => product.category === type);
 };
 
 window.addEventListener("DOMContentLoaded", async () => {
   const products = await getProducts();
   const defaultProducts = await filterArray("trend");
   const specialProducts = await filterArray("special");
   const recentProducts = await filterArray("recent");
   displayProducts(defaultProducts, productCenter);
   displayProducts(specialProducts, specialCenter);
   displayProducts(recentProducts, recentCenter);
   displayProducts(products, shopCenter);
 });


 