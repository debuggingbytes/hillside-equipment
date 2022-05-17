<!-- Remove the container if you want to extend the Footer to full width. -->
<div class="container-fluid pt-4 bg-gray">
  <!-- Footer -->
  <footer class="text-center text-lg-start text-white ">
    <!-- Section: Links  -->
    <section class="">
      <div class="container-fluid text-center text-md-start mt-2">
        <!-- Grid row -->
        <div class="row mt-1">
          <!-- Grid column -->
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-2">
            <!-- Content -->
            <h6 class="text-uppercase fw-bold">Hillside Cares</h6>
            <hr class="mb-2 mt-0 d-inline-block mx-auto"
              style="width: 60px; background-color: rgb(22, 230, 22); height: 2px" />
            <p>
              Hillside Equipment is a proud supporter of The Cerebral Palsy Association of Alberta
              <div class="text-center">
                <a href='https://www.cpalberta.com/' target="_blank"><img src="{{ asset('files/hillside-equipment-cerebral-pralsy-of-alberta.png') }}" class="img-fluid w-50 pe-5" alt=""></a>

              </div>
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-2">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold">Quick Links</h6>
            <hr class="mb-2 mt-0 d-inline-block mx-auto"
              style="width: 60px; background-color: rgb(22, 230, 22); height: 2px" />
            <p>
              <a href="#!" class="text-white">Home</a>
            </p>
            <p>
              <a href="#!" class="text-white">Services</a>
            </p>
            <p>
              <a href="#!" class="text-white">Parts</a>
            </p>
            <p>
              <a href="#!" class="text-white">Contact Us</a>
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-2">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold">Contact</h6>
            <hr class="mb-2 mt-0 d-inline-block mx-auto"
              style="width: 60px; background-color: rgb(22, 230, 22); height: 2px" />
            <p><i class="fas fa-home me-2"></i> 1805 8th St, Nisku, AB</p>
            <p><i class="fas fa-envelope me-2"></i> info[at]hillsideequipment.com</p>
            <p><i class="fas fa-phone me-2"></i> +1 780 916 3103</p>
            <h6 class="text-uppercase fw-bold">Hours</h6>
            <p><i class="fas fa-clock me-2"></i> Mon-Fri: 8am - 5pm</p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-2">
            <!-- Google Map -->
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2382.4579111308376!2d-113.51820928398969!3d53.33505878325743!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x539ff7da603851c3%3A0xa1e8b4c4ff18304!2sHillside%20Equipment!5e0!3m2!1sen!2sca!4v1647448356815!5m2!1sen!2sca"
              width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
      </div>
    </section>
    <!-- Section: Links  -->
  </footer>
  <!-- Footer -->
</div>
<!-- Copyright -->
<div class="text-center p-3 bg-gray bg-gradient text-white">
  © <span id="year"></span> Hillside Equipment<br>
  Content and Material cannot be reused without written consent
  from website owner.<br>
  <span class="developed">Website developed &amp; maintained by: <a class="text-white d-block" href="https://debuggingbytes.com"
      target="_blank">www.DebuggingBytes.com</a></span>
</div>
<!-- Copyright -->
<!-- End of .container -->
<!-- #Website div container -->
</div>
<!-- Bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
crossorigin="anonymous"></script>
<!-- jQuery -->
<script src="{{ asset('files/script.js') }}"></script>
@yield('scripts')

</body>

</html>