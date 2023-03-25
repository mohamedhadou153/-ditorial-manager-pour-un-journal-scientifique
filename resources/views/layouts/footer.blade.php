<style>
    .footer-basic {
    padding:40px 0;
    background-color:black;
    color:white;
  }

  .footer-basic ul {
    padding:0;
    list-style:none;
    text-align:center;
    font-size:18px;
    line-height:1.6;
    margin-bottom:0;
    color: white;
  }

  .footer-basic li {
    padding:0 10px;
  }

  .footer-basic ul a {
    color:white;
    text-decoration:none;
    opacity:0.8;
  }

  .footer-basic ul a:hover {
    opacity:1;
  }

  .footer-basic .social {
    text-align:center;
    padding-bottom:25px;
  }

  .footer-basic .social > a {
    font-size:24px;
    width:40px;
    height:40px;
    line-height:40px;
    display:inline-block;
    text-align:center;
    border-radius:50%;
    margin:0 8px;
    color:inherit;
    opacity:0.75;
  }


  .footer-basic .social > a:hover {
    opacity:0.9;
  }

  .footer-basic .copyright {
    margin-top:13px;
    text-align:center;
    font-size:13px;
    color:white;
    margin-bottom:0;
 }
 
 .footer-basic .copyright a{
  
    font-size:20px;
    color:white;
    
 }
</style>
<style>
      .social {
      margin:10;
      padding:0;
      background: black;
    }
    .social ul {
      position:absolute;
      left:50%;
      transform:translate(-50%,-50%);
      margin:0;
      padding:0;
      display:flex;
    }
    .social ul li {
      list-style:none;
    }
    .social ul li a {
      display:block;
      position:relative;
      width:50px;
      height:50px;
      line-height:100px;
      font-size:40px;
      text-align:center;
      text-decoration:none;
      color:#404040;
      margin: 0 25px;
      transition:.5s;
    }
    .social ul li a span {
      position:absolute;
      transition: transform .5s;
    }
    .social ul li a span:nth-child(1),
    .social ul li a span:nth-child(3){
      width:100%;
      height:3px;
      background:#404040;
    }
    .social ul li a span:nth-child(1) {
      top:-8;
      left:0;
      transform-origin: right;
    }
    .social ul li a:hover span:nth-child(1) {
      transform: scaleX(0);
      transform-origin: left;
      transition:transform .5s;
    }

    .social ul li a span:nth-child(3) {
      bottom:0;
      left:0;
      transform-origin: left;
    }
    
    .social ul li a:hover span:nth-child(3) {
      transform: scaleX(0);
      transform-origin: right;
      transition:transform .5s;
    }

    .social ul li a span:nth-child(2),
    .social ul li a span:nth-child(4){
      width:3px;
      height:100%;
      background:#404040;
    }
    .social ul li a span:nth-child(2) {
      top:0;
      left:-5;
      transform:scale(0);
      transform-origin: bottom;
    }
    .social ul li a:hover span:nth-child(2) {
      transform: scale(1);
      transform-origin: top;
      transition:transform .5s;
    }
    .social ul li a span:nth-child(4) {
      top:0;
      right:-5;
      transform:scale(0);
      transform-origin: top;
    }
    .social ul li a:hover span:nth-child(4) {
      transform: scale(1);
      transform-origin: bottom;
      transition:transform .5s;
    }

    .facebook:hover {
      color: #3b5998;
    }
    .facebook:hover span { 
      background: #3b5998;
    }
    .twitter:hover {
      color: #1da1f2;
    }
    .twitter:hover span { 
      background: #1da1f2;
    }
    .instagram:hover {
      color: #c32aa3;
    }
    .instagram:hover span { 
      background: #c32aa3;
    }
    .google:hover {
      color: #dd4b39;
    }
    .google:hover span { 
      background: #dd4b39;
    }
    ul li a .twitter {
      color: #1da1f2;
    }
    ul li a:hover:nth-child(3) {
      color: #c32aa3;
    }
    ul li a:hover:nth-child(4) {
      color: #dd4b39;
    }
</style>
    <div class="footer-basic">
        <footer>
          <div class="social">
              <ul>
                <li>
                  <a class="facebook" href="#">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                  </a>
                </li>
                <li>
                  <a class="twitter" href="#">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                  </a>
                </li>
                <li>
                  <a class="instagram" href="#">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <i class="fa fa-instagram" aria-hidden="true"></i>
                  </a>
                </li>
                <li>
                  <a class="google" href="#">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <i class="fa fa-google-plus" aria-hidden="true"></i>
                  </a>
                </li>
              </ul>
          </div>
          
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Home</a></li>
                <li class="list-inline-item"><a href="#">Services</a></li>
                <li class="list-inline-item"><a href="#">About</a></li>
                <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
            </ul>
            <p class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved by <a href="http://127.0.0.1:8000" target="_blank">BrandArticle.com</a>
					
        </footer>
    </div>
