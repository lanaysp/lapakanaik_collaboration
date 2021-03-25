
      <section class="mt-5 mb-n5 bg-footer" style="padding-top: 100px; padding-bottom:50px;">
        <div class="container">
          <div class="row">
            <div class="col-12 col-md-4 col-lg-3 mb-2">
                <h6 class="mb-4">Kantor Lapakanik</h6>
                @forelse ($medsos as $sosial)
                <div class="">{{ $sosial->alamat }}</div>
                <div class="">Telepon/Wa : {{ $sosial->hp }} </div>
                @empty

                @endforelse
            </div>
            <div class="col-12 col-md-4 col-lg-2">
              <h6 class="mb-4">Bantuan</h6>
              <a target="_blank" rel="noopener noreferrer" class="component-products d-block" href="https://www.lapakanik.co.id/">
                <div class="products-text-footer">Tentang Lapakanik</div>
              </a>
              <a target="_blank" rel="noopener noreferrer" class="component-products d-block" href="https://www.lapakanik.co.id/">
                <div class="products-text-footer">Toko Online</div>
              </a>
              <a target="_blank" rel="noopener noreferrer" class="component-products d-block" href="https://www.lapakanik.com/faq-lapakanik-nusantara/s">
                <div class="products-text-footer">FAQ</div>
              </a>
            </div>
            <div class="col-12 col-md-3 col-lg-4">
              <h6 class="mb-4">Temukan Kami</h6>

              @forelse ($medsos as $sosial)

                <a target="_blank" rel="noopener noreferrer" href=" {{ $sosial->ig }}"
                  ><img class="sosial-media" src="/images/instagram.png" alt=""
                /></a>

                <a target="_blank" rel="noopener noreferrer" href="{{ $sosial->fb }}"
                  ><img class="sosial-media" src="/images/facebook.png" alt=""
                /></a>

                <a target="_blank" rel="noopener noreferrer" href="{{ $sosial->yt }}"
                  ><img class="sosial-media" src="/images/youtube.png" alt=""
                /></a>

                <a target="_blank" rel="noopener noreferrer" href="{{ $sosial->tw }}"
                  ><img class="sosial-media" src="/images/twitter.png" alt=""
                /></a>
                <a target="_blank" rel="noopener noreferrer" href="{{ $sosial->tt }}"
                  ><img class="sosial-media" src="/images/tiktok.png" alt=""
                /></a>
              @empty

              @endforelse
            </div>
            <div class="col-12 col-md-4 col-lg-3">
                 <h6 class="mb-4">Hubungi Kami</h6>

              @forelse ($medsos as $sosial)
                <span class="component-products d-block disabled" href="">
                  <div class="">Cs: {{ $sosial->cs }} </div>
                </span>
                <span class="component-products d-block disabled">
                  <a class="mailto products-text-footer d-block text-decoration-none" href="mailto:{{ $sosial->email }}"><div class="products-text-footer">Email : {{ $sosial->email }}</div></a>
                </span>
                <span class="component-products d-block disabled" href="">
                    <a target="_blank" rel="noopener noreferrer" class="products-text-footer d-block text-decoration-none" href="http://bit.ly/lapakanikrebana">
                  <div class="">No WhatsApp: {{ $sosial->hp }} </div>
                  </a>
                </span>
              @empty

              @endforelse

            </div>
          </div>
        </div>
        <div class="col-12 col-md-4 col-lg-12 mt-2">
                <p class="text-white text-center">
                © Copyright @php echo date('Y') @endphp <a class="products-text-footer" >PT. Lapakanik Multiguna Nusantara.</a>
                </p>
              </div>
      </section>


