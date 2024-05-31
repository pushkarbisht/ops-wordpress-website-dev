(function() {
  "use strict";

  window.addEventListener('load', () => {
    on_page_load()
  });

  /**
   * Function gets called when page is loaded.
   */
  function on_page_load() {
    // Initialize On-scroll Animations
    AOS.init({
      anchorPlacement: 'top-left',
      duration: 600,
      easing: "ease-in-out",
      once: true,
      mirror: false,
      disable: 'mobile'
    });
  }

  /**
   * Navbar effects and scrolltop buttons upon scrolling
   */
  const navbar = document.getElementById('header-nav')
  var body = document.getElementsByTagName("body")[0]
  const scrollTop = document.getElementById('scrolltop')
  window.onscroll = () => {
    if (window.scrollY > 0) {
      navbar.classList.add('fixed-top', 'shadow-sm')
     // document.getElementsByClassName("grey-color-full-screen")[0].style.display = "block";
     // document.getElementsByClassName("white-color-full-screen")[0].style.display = "none";
      body.style.paddingTop = navbar.offsetHeight + "px"
      scrollTop.style.visibility = "visible";
      scrollTop.style.opacity = 1;
    } else {
      navbar.classList.remove('fixed-top', 'shadow-sm')
   //   document.getElementsByClassName("grey-color-full-screen")[0].style.display = "none";
   //   document.getElementsByClassName("white-color-full-screen")[0].style.display = "block";
      body.style.paddingTop = "0px"
      scrollTop.style.visibility = "hidden";
      scrollTop.style.opacity = 0;
    }
  };

  /**
   * Masonry Grid
   */
  var elem = document.querySelector('.grid');
  if(elem) {
    imagesLoaded(elem, function() {
      new Masonry(elem, {
        itemSelector: '.grid-item',
        percentPosition: true,
        horizontalOrder: true
      });
    })
  }

  /**
   * Big Picture Popup for images and videos
   */
   document.querySelectorAll("[data-bigpicture]").forEach((function(e) {
     e.addEventListener("click", (function(t){
       t.preventDefault();
       const data =JSON.parse(e.dataset.bigpicture)
       BigPicture({
        el: t.target,
        ...data
      })
     })
    )
  }))

  /**
   * Big Picture Popup for Photo Gallary
   */
   document.querySelectorAll(".bp-gallery a").forEach((function(e) {
    var caption = e.querySelector('figcaption')
    var img = e.querySelector('img')
    // set the link present on the item to the caption in full view
    img.dataset.caption = '<a class="link-light" target="_blank" href="' + e.href + '">' + caption.innerHTML + '</a>';
    window.console.log(caption, img)
     e.addEventListener("click", (function(t){
       t.preventDefault();
       BigPicture({
        el: t.target,
        gallery: '.bp-gallery',
      })
     })
    )
  }))

  // Add your javascript here

  let reset_button = document.getElementById("reset_button");

  reset_button.addEventListener("click",()=>{
    //let name = document.getElementById("registration_name");
    let email = document.getElementById("registration_email");
   // let message = document.getElementById("registration_message");
   // let phone = document.getElementById("phone");
   let purpose = document.getElementById("purpose");
    let type = document.getElementById("type");
    let otp = document.getElementById("registration_otp");

    
    otp.required = false;

    //name.disabled = false;
    email.disabled = false;
    purpose.disabled = false;
    //name.value = "";
    email.value = "";
    purpose.value = "";
    otp.value = "";
    type.value = "";
    type.disabled=false;

    document.getElementById("enabled_submit_button").style.display = "block";
    document.getElementById("disabled_submit_button").style.display = "none";
    document.getElementById("reset_button").style.display = "none";
    document.getElementById("registration_otp_div").style.display = "none";

    document.getElementById("resend_otp").style.display = "none";

    document.getElementById("wrong_otp").style.display = "none";
    document.getElementById("random_error").style.display = "none";
  
  })
 
  let loginForm = document.getElementById("contactusform");

  loginForm.addEventListener("submit", async(e) => {
    e.preventDefault();
  
   console.log("Form submitted");
   //let name = document.getElementById("registration_name");
    let email = document.getElementById("registration_email");
  //  let message = document.getElementById("registration_message");
  //  let phone = document.getElementById("phone");
  let purpose = document.getElementById("purpose");
    let type = document.getElementById("type");

    let otp = document.getElementById("registration_otp");
  
    if (purpose.value == "" || email.value == "" || type.value == "") {
     // alert("Ensure you input a value in all the fields!");
    } else {

      if(otp.value){
        let res = null;
        try{
          document.getElementById("enabled_submit_button").style.display = "none";
          document.getElementById("disabled_submit_button").style.display = "block";
          document.getElementById("reset_button").style.display = "none";
          let baseURL = "";
          if(window.location.hostname == "127.0.0.1" || window.location.hostname =="localhost"){
            baseURL = "http://127.0.0.1:5001/ops-webite/us-central1/app";
          }
          
     
           res = await fetch(baseURL+"/verify?email="+email.value.trim()+"&otp="+otp.value.trim(),
          {
            method: "POST", 
            mode: "cors", 
            cache: "no-cache", 
            credentials: "same-origin", 
            headers: {
              "Content-Type": "application/json",
            
            },
            redirect: "follow", 
            referrerPolicy: "no-referrer", // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
            body: JSON.stringify({
              
              type : type.value.trim(),
              purpose : purpose.value.trim()
            }), //
          });

          document.getElementById("enabled_submit_button").style.display = "block";
          document.getElementById("disabled_submit_button").style.display = "none";
          document.getElementById("reset_button").style.display = "block";
          let r = await res.text();
          console.log(r);
          if(res?.status == 201){
            document.getElementById("resend_otp").style.display = "block";
            document.getElementById("wrong_otp").style.display = "none";
            document.getElementById("random_error").style.display = "none";
          }
          else if (res?.status == 200){
            document.getElementById("contactusform").style.display = "none";
            document.getElementById("wrong_otp").style.display = "none";
            
            document.getElementById("success_message").style.display = "block";
          }
          else if(res?.status == 500){
            
            document.getElementById("wrong_otp").style.display = "block";
          }
          else if(res?.status == 501){
            
            document.getElementById("random_error").style.display = "block";
          }
        
        }
   

      

        catch(err){

        }

       


        
      }
      else{
        console.log("OTP request started");
        try{
          document.getElementById("enabled_submit_button").style.display = "none";
          document.getElementById("disabled_submit_button").style.display = "block";
          let baseURL = "";
          if(window.location.hostname == "127.0.0.1" || window.location.hostname =="localhost"){
            baseURL = "http://127.0.0.1:5001/ops-webite/us-central1/app";
          }
          
          let res = await fetch(baseURL+"/send-otp?email="+email.value,
          {
            method: "POST", 
            mode: "cors", 
            cache: "no-cache", 
            credentials: "same-origin", 
            headers: {
              "Content-Type": "application/json",
            
            },
            redirect: "follow", 
            referrerPolicy: "no-referrer", // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
            body: JSON.stringify({
              
            }), //
          });

          let r = await res.text();
          console.log(r);
          if(res?.status == 200){
            document.getElementById("already_registered").style.display = "none";
            document.getElementById("registration_otp_div").style.display = "block";
            document.getElementById("enabled_submit_button").style.display = "block";
            document.getElementById("disabled_submit_button").style.display = "none";
    
            document.getElementById("reset_button").style.display = "block";
    
    
            otp.required = true;
    
            //name.disabled = true;
            email.disabled = true;
            //message.disabled = true;
            purpose.disabled = true;
            type.disabled = true;
          }
          if(res?.status == 500){
            document.getElementById("enabled_submit_button").style.display = "block";
            document.getElementById("disabled_submit_button").style.display = "none";
            document.getElementById("reset_button").style.display = "none";
          }
          if(res?.status == 502){
            document.getElementById("enabled_submit_button").style.display = "block";
          document.getElementById("disabled_submit_button").style.display = "none";
          document.getElementById("reset_button").style.display = "none";
          
          document.getElementById("already_registered").style.display = "block";
          }
         
        }
        catch(err){
          
          document.getElementById("enabled_submit_button").style.display = "block";
          document.getElementById("disabled_submit_button").style.display = "none";
          document.getElementById("reset_button").style.display = "none";
        }
      }
      
    
      
    }
  });


})();