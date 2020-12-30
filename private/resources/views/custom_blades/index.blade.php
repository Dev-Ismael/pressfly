@extends('custom_blades.layout')

@section('content')








        
    <div class="hero-wrap js-fullheight">
        <div class="overlay"></div>
        <div class="container-fluid px-0">
            <div class="row d-md-flex no-gutters slider-text align-items-center js-fullheight justify-content-end">
                <img class="one-third js-fullheight align-self-end order-md-last img-fluid" src="{{ asset("assets/custom_assets/images/undraw_pair_programming_njlp.svg")}}"  alt="">
            <div class="one-forth d-flex align-items-center ftco-animate js-fullheight">
                <div class="text mt-5">
                    <h2 class="text-bold"><span> Start your career with us </span></h2>
                    <p>You don't need to have a degree or have finished a course in order to pursue a writing career online. If you can write, go ahead and start your career with us.</p>
                    <p><a href="{{ url('/member') }}" class="btn btn-primary px-4 py-3">Get in touch</a></p>
                </div>
            </div>
            </div>
        </div>
    </div>


     

    <section class="ftco-section services-section bg-light" id="features">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <h2 class="mb-4">Features</h2>
                    <div class="underline_div"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services d-flex align-items-center">
                        <div class="icon d-flex align-items-center justify-content-center order-md-last">
                            <i class="fas fa-eye"></i>
                        </div>
                        <div class="media-body pl-4 pl-md-0 pr-md-4 text-md-right">
                        <h3 class="heading">High visibility</h3>
                        <p class="mb-0">People from more than 80 countries visit our website every day. Your work will be high visibility all the world.</p>
                        </div>
                    </div>      
                </div>
                <div class="col-md-6 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services d-flex align-items-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <i class="fas fa-ad"></i>
                        </div>
                        <div class="media-body pl-4">
                        <h3 class="heading">Premium content</h3>
                        <p class="mb-0">Your quality creations will get more display and higher prices.</p>
                        </div>
                    </div>    
                </div>
                <div class="col-md-6 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services d-flex align-items-center">
                        <div class="icon d-flex align-items-center justify-content-center order-md-last">
                            <span class="flaticon-customer-service"></span>
                        </div>
                        <div class="media-body pl-4 pl-md-0 pr-md-4 text-md-right">
                        <h3 class="heading">Exclusive agreement</h3>
                        <p>Your content will be authorized to Pngtree and get more display and protected.</p>
                        </div>
                    </div>      
                </div>
                <div class="col-md-6 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services d-flex align-items-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="flaticon-life-insurance"></span>
                        </div>
                        <div class="media-body pl-4">
                        <h3 class="heading">Copyright protected</h3>
                        <p>All contributor content copyright protected by Pngtree against plagiarism.</p>
                        </div>
                    </div>      
                </div>
                <div class="col-md-6 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services d-flex align-items-center">
                        <div class="icon d-flex align-items-center justify-content-center order-md-last">
                            <i class="fas fa-laptop"></i>
                        </div>
                        <div class="media-body pl-4 pl-md-0 pr-md-4 text-md-right">
                        <h3 class="heading">Content for any types of media</h3>
                        <p>You can be signing up for your very first job within minutes, even if you're all the way in all countries! That's the beauty about the Internet.</p>
                        </div>
                    </div>    
                </div>
                <div class="col-md-6 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services d-flex align-items-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="flaticon-settings"></span>
                        </div>
                        <div class="media-body pl-4">
                        <h3 class="heading">24/7 Support</h3>
                        <p> it's a 24hr, World-Wide GOLDMINE! You can work when you want and how you wants.</p>
                        </div>
                    </div>      
                </div>
            </div>
        </div>
    </section>






    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <h2 class="mb-4">About US</h2>
                    <div class="underline_div"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 nav-link-wrap  pb-sm-1 ftco-animate">
                    <div class="nav ftco-animate nav-pills justify-content-center text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-nextgen-tab" data-toggle="pill" href="#v-pills-nextgen" role="tab" aria-controls="v-pills-nextgen" aria-selected="true">Online Work</a>
                        <a class="nav-link" id="v-pills-performance-tab" data-toggle="pill" href="#v-pills-performance" role="tab" aria-controls="v-pills-performance" aria-selected="false">Writing Jobs</a>
                        <a class="nav-link" id="v-pills-effect-tab" data-toggle="pill" href="#v-pills-effect" role="tab" aria-controls="v-pills-effect" aria-selected="false">Perfect opportunity</a>
                    </div>
                </div>
                <div class="col-md-12 align-items-center ftco-animate">
                    <div class="tab-content ftco-animate" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-nextgen" role="tabpanel" aria-labelledby="v-pills-nextgen-tab">
                            <div class="d-md-flex">
                                <div class="one-forth align-self-center">
                                    <img src="{{ asset("assets/custom_assets/images/undraw_laravel_and_vue_59tp.svg")}}"  class="img-fluid" alt="">
                                </div>
                                <div class="one-half ml-md-5 align-self-center">
                                    <h2 class="mb-4">Online Work</h2>
                                    <p>How would you like to write conveniently at home, work at flexible hours, set your own schedule, spend more time with your family and friends, and get a nice big fat paycheck at the end of the month?</p>
                                    <p><a href="{{ url('/member') }}" class="btn btn-primary py-3">Join Now !</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-performance" role="tabpanel" aria-labelledby="v-pills-performance-tab">
                            <div class="d-md-flex">
                                <div class="one-forth order-last align-self-center">
                                    <img src="{{ asset("assets/custom_assets/images/undraw_visual_data_b1wx.svg")}}"  class="img-fluid" alt="">
                                </div>
                                <div class="one-half order-first mr-md-5 align-self-center">
                                    <h2 class="mb-4">Writing Online Job</h2>
                                    <p>Writing Jobs by tasked.info and its partners bring you fresh and creative opportunities to get writing jobs online and get paid to boot!!!</p>
                                    <p><a href="{{ url('/member') }}" class="btn btn-primary py-3">Join Now !</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-effect" role="tabpanel" aria-labelledby="v-pills-effect-tab">
                            <div class="d-md-flex">
                                <div class="one-forth align-self-center">
                                    <img src="{{ asset("assets/custom_assets/images/undraw_business_plan_5i9d.svg")}}"  class="img-fluid" alt="">
                                </div>
                                <div class="one-half ml-md-5 align-self-center">
                                    <h2 class="mb-4">Perfect opportunity</h2>
                                    <p>This is a perfect opportunity for freelance writers and just about anybody who can write that just don’t have time for a commute to a dead end, part-time job. Or, for anyone for wants to sit in their pajamas and work at home!</p>
                                    <p><a href="{{ url('/member') }}" class="btn btn-primary py-3">Join Now !</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <section class="ftco-section ftco-counter img" id="section-counter">
        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
                    <h2 class="mb-4">Statistics</h2>
                    <div class="underline_div white"></div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <strong class="number" data-number="42000">0</strong>
                                    <span> <i class="far fa-newspaper"></i> Total Article</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <strong class="number" data-number="3200">0</strong>
                                    <span> <i class="fas fa-users"></i> Users</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <strong class="number" data-number="98000">0</strong>
                                    <span> <i class="far fa-eye"></i> Daily Views</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <strong style="color:#fff">$</strong> <strong class="number" data-number="580">0</strong>
                                    <span> <i class="fas fa-dollar-sign"></i> Daily withdraw</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <section class="ftco-section ftco-no-pt ftc-no-pb bg-light" id="why_us">
        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-md-7 text-center heading-section  ftco-animate">
                    <h2 class="mb-4">Why Choose Us</h2>
                    <div class="underline_div"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <img src="{{ asset("assets/custom_assets/images/undraw_podcast_q6p7.svg")}}"   class="img-fluid" alt="">
                    <div class="heading-section ftco-animate mt-5">
                        <h2 class="mb-4" style="font-size: 30px">Everything is online</h2>
                        <p>Everything is online, so once you signup you will have INSTANT ACCESS to the members area. Start getting Paid as an Online Writer Today!</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-md-6 ftco-animate">
                            <div class="media block-6 services border text-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <i class="fas fa-universal-access"></i>
                        </div>
                        <div class="mt-3 media-body media-body-2">
                            <h3 class="heading">increase visitors</h3>
                            <p>When you register on the site and bring visitors in your link will increase your rates on the site and increase your profits</p>
                        </div>
                    </div>
                        </div>
                        <div class="col-md-6 ftco-animate">
                            <div class="media block-6 services border text-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <i class="fas fa-bezier-curve"></i>
                        </div>
                        <div class="mt-3 media-body media-body-2">
                            <h3 class="heading">Fast cash</h3>
                            <p>Whether you're looking to make some fast cash, or you're after long-term, more sustainable income-producing results</p>
                        </div>
                    </div>
                        </div>
                        <div class="col-md-6 ftco-animate">
                            <div class="media block-6 services border text-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <i class="fas fa-crop-alt"></i>
                        </div>
                        <div class="mt-3 media-body media-body-2">
                            <h3 class="heading">Free</h3>
                            <p>Writing articles is a completely free tool where you can create short links, which apart from being free, you get paid! So, now you can make money from home</p>
                        </div>
                    </div>
                        </div>
                        <div class="col-md-6 ftco-animate">
                            <div class="media block-6 services border text-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <i class="fas fa-door-open"></i>
                        </div>
                        <div class="mt-3 media-body media-body-2">
                            <h3 class="heading">creative opportunities</h3>
                            <p>Writing Jobs by tasked.info and its partners bring you fresh and creative opportunities to get writing jobs online </p>
                        </div>
                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <section class="ftco-section bg-light" id="our_websites">
        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-md-7 text-center heading-section  ftco-animate">
                    <h2 class="mb-4">Our Websites</h2>
                    <div class="underline_div"></div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="row">
                        
                        <h4 class="ftco-animate"> <i class="fas fa-language" style="color: #140850" ></i> English Content</h4>
                        <table class="table ftco-animate mb-5">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col"><i class="far fa-keyboard"></i>Content</th>
                                    <th scope="col"> <i class="fas fa-globe-americas"></i> WebSite</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td> <i class="far fa-newspaper"></i> News</td>
                                    <td> <a href="https://news.topiclix.com" target="_blank"> news.topiclix.com </a> </td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td> <i class="fas fa-dog"></i> Vets</td>
                                    <td> <a href="https://vets.topiclix.com" target="_blank"> vets.topiclix.com </a> </td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td> <i class="fas fa-futbol"></i> Sports</td>
                                    <td> <a href="https://sports.topiclix.com" target="_blank"> sports.topiclix.com </a> </td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td> <i class="fas fa-dollar-sign"></i> Bitcoin & Earn From Internet</td>
                                    <td> <a href="https://trading.topiclix.com" target="_blank"> trading.topiclix.com </a> </td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td> <i class="fas fa-utensils"></i> Foods & recipes</td>
                                    <td> <a href="https://recipes.topiclix.com" target="_blank"> recipes.topiclix.com </a> </td>
                                </tr>
                                <tr>
                                    <th scope="row">6</th>
                                    <td> <i class="fas fa-plane"></i> LifeStyle & Travel & architecture</td>
                                    <td> <a href="https://lifstyle.topiclix.com" target="_blank">lifstyle.topiclix.com </a> </td>
                                </tr>
                                <tr>
                                    <th scope="row">7</th>
                                    <td> <i class="fas fa-tshirt"></i> Fashion & beauty & spa</td>
                                    <td> <a href="https://fashion.topiclix.com" target="_blank"> fashion.topiclix.com </a> </td>
                                </tr>
                            </tbody>
                        </table>
                        
                        <h4 class="ftco-animate"> <i class="fas fa-language" style="color: #140850" ></i>Arabic Content</h4>
                        <table class="table ftco-animate arabia">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col" class="arabic-text"> <i class="far fa-keyboard"></i> المحتوي </th>
                                    <th scope="col" class="arabic-text"> <i class="fas fa-globe-americas"></i> الموقع</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td class="arabic-text">الاخبار  <i class="far fa-newspaper"></i>  </td>
                                    <td> <a href="https://news.topiclix.com" target="_blank"> news.arabia.topiclix.com </a> </td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td class="arabic-text">الحيوانات الاليفة  <i class="fas fa-dog"></i>  </td>
                                    <td> <a href="https://vets.topiclix.com" target="_blank"> vets.arabia.topiclix.com </a> </td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td class="arabic-text">الرياضة  <i class="far fa-futbol"></i>  </td>
                                    <td> <a href="https://sports.arabia.topiclix.com" target="_blank"> sports.arabia.topiclix.com </a> </td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td class="arabic-text">التداول و الربح من الانترنت  <i class="fas fa-dollar-sign"></i>  </td>
                                    <td> <a href="https://trading.arabia.topiclix.com" target="_blank"> trading.arabia.topiclix.com </a> </td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td class="arabic-text">الاكلات و اشهر الوصفات  <i class="fas fa-utensils"></i>  </td>
                                    <td> <a href="https://recipes.arabia.topiclix.com" target="_blank"> recipes.arabia.topiclix.com </a> </td>
                                </tr>
                                <tr>
                                    <th scope="row">6</th>
                                    <td class="arabic-text">السياحة و السفر  <i class="fas fa-plane"></i>  </td>
                                    <td> <a href="https://lifstyle.arabia.topiclix.com" target="_blank">lifstyle.arabia.topiclix.com </a> </td>
                                </tr>
                                <tr>
                                    <th scope="row">7</th>
                                    <td class="arabic-text">الموضة و الجمال  <i class="fas fa-tshirt"></i>  </td>
                                    <td> <a href="https://fashion.arabia.topiclix.com" target="_blank"> fashion.arabia.topiclix.com </a> </td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                        <br>
                        <br>

                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 
    <section class="ftco-section ftco-partner mb-5 payment-methods bg-light">
        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
                    <h2 class="mb-4" style="color: #000">Payments Methods</h2>
                    <div class="underline_div"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm ftco-animate">
                    <a href="#" class="partner"><img src="{{ asset("assets/custom_assets/images/partner-1.png")}}"  class="img-fluid" alt="Colorlib Template"></a>
                </div>
                <div class="col-sm ftco-animate">
                    <a href="#" class="partner"><img src="{{ asset("assets/custom_assets/images/partner-2.png")}}"  class="img-fluid" alt="Colorlib Template"></a>
                </div>
                <div class="col-sm ftco-animate">
                    <a href="#" class="partner"><img src="{{ asset("assets/custom_assets/images/partner-3.png")}}"  class="img-fluid" alt="Colorlib Template"></a>
                </div>
                <div class="col-sm ftco-animate">
                    <a href="#" class="partner"><img src="{{ asset("assets/custom_assets/images/partner-4.png")}}"  class="img-fluid" alt="Colorlib Template"></a>
                </div>
                <div class="col-sm ftco-animate">
                    <a href="#" class="partner"><img src="{{ asset("assets/custom_assets/images/partner-5.png")}}"  class="img-fluid" alt="Colorlib Template"></a>
                </div>
                <div class="col-sm ftco-animate">
                    <a href="#" class="partner"><img src="{{ asset("assets/custom_assets/images/partner-6.png")}}"  class="img-fluid" alt="Colorlib Template"></a>
                </div>
            </div>
        </div>
    </section> 
    --}}

@endsection
