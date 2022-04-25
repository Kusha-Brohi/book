@extends('layouts.main')

@section('content')
    <section class="story-sec">

        <div class="container">

            <div class="story_heading">
                <div class="row align-items-center">
                    <div class="col-lg-6 text-center">
                        <h2>Rescue from the Rock</h2>
                        <h3>by Brian D. Ratty <br> ©2022
                        </h3>
                    </div>
                    <div class="col-lg-6">
                        <img src="{{asset('images/r1.jpg')}}" alt="">
                    </div>
                </div>
            </div>

            <!-- <div class="row align-items-end mb-5">

                <div class="col-md-5">

                    <img src="{{asset('images/s1.jpg')}}" alt="">

                </div>

                <div class="col-md-7">

                    <img src="{{asset('images/s2.jpg')}}" alt="">

                </div>

            </div> -->
            <p>With trees snapping and winds howling in the disastrous coastal winter storms my mind raced back to my grandfather, Harry, and his daring rescue off the Tillamook Rock Lighthouse in 1934.</p>
            <p>As a young boy in the early 1950’s, I remember visiting my grandparent’s home in west Portland where, over the fireplace mantel, hung two black & white photographs that Harry had neatly framed. These images, which had appeared in the National
                Geographic Magazine in August of 1936, helped him tell his story of being rescued from the rock. After his death in 1970, those photos and his story became just a foggy memory to me. Then, last year, a cousin loaned me a tattered box full
                of family memorabilia. Deep inside, I found both the yellowing photographs and my grandfather’s story on faded newspaper clippings. With the aid of today’s technology, I was able to restore both the images and the story of his daring rescue.</p>
            <p>In the 1930’s, Harry Ratty worked for the Lighthouse Service as a maintenance engineer. He traveled from Cape Disappointment to Coos Bay, repairing the many lighthouses that dotted the region. These bright white sentinels were manned 24-7
                by keepers who spent months on station. Harry and his crews kept their lights burning, the fog horns blasting, and the keepers safe from the terrible elements</p>
            <p>My grandfather was a quiet man with that Oregon sprit of rugged independence. Just after the turn of the century, he entered the building trades and helped shape the Portland skyline with structures like the J.K. Gill Building, the Lipman
                Wolfe Building and the old Multnomah Hotel. In 1928, he helped build the Big Dipper roller coaster at the Jantzen Beach Amusement Park. Coincidentally, my father Dudley (also a contractor) tore down that same coaster in 1972. Harry also
                worked on the Bonneville dam and, during World War II, was in charge of the civilian contractors at the Warrenton Naval Air Station on the north coast. But, of all of his accomplishments, it was the Rock that he talked about the most.
            </p>
            <div class="row r1">
                <div class="col-lg-6">
                    <img src="{{asset('images/r3.jpg')}}" alt="">
                </div>
                <div class="col-lg-6">
                    <img src="{{asset('images/r4.jpg')}}" alt="">
                </div>
            </div>
            <p>Tillamook Rock Lighthouse, also known as Terrible Tillie, is the most exposed lighthouse on the Pacific coast, and has survived many violent storms. Although the lantern is 133 feet above the level of the sea, the protective glass has, on
                more than one occasion, been shattered by stones hurled by giant waves. In 1878, Congress appropriated $50,000 for the construction of a lighthouse on the crest of Tillamook Rock, a huge stone monolith just over a mile west of Tillamook
                Head and twenty miles south of the Columbia River entrance. It took nearly three years for the Army Corps of Engineers to chisel out the lighthouse. During the building of the station, a lighthouse engineer lost his life while attempting
                a landing on the rock</p>
            <p>In October of 1934, a violent storm swept over the Rock, causing over $5,000 damage to lighthouse. As the storm finally retreated, Harry and his crew were landed on the rock via lighthouse tender. A few weeks later, while extensive repairs
                were being made, a second ferocious storm blew up from the south. This one had winds of over 75 mph and sent 60-pound boulders smashing against the light tower and stone buildings. Power was lost again, as was the telephone cable to shore.
                With windows broken, rain and sea pouring in, and the light’s Fresnel lens shattered, the four marooned keepers and five-man work party rode out the gale for almost five days. Finally, one of the keepers, a ham radio operator, made contact
                with shore for rescue. During this time, Harry, a crew member and one of the other keepers were taken seriously ill as a result of exposure. A rescue boat was sent but, after two days of unsuccessful attempts to remove them from the rock,
                the lighthouse tender Rose was dispatched. In dangerous, stormy waters, she was able to shoot a rope line to the lighthouse and rig up a breeches buoy from the rock to her deck. Riding the breeches buoy from the lighthouse, over the churning
                waters, to the pitching deck of the Rose was an experience my grandfather would never forget. By the time Harry (pictured) reached the tender, riding just over the bobbing safety boat, his shoes were wet and his nerves frayed. Aboard the
                tender was a Coast Guard photographer, who took the pictures. Harry and four others were removed from the lighthouse in this manner while replacement crews and supplies were sent back up. My grandfather and two of the others were sent
                on to Astoria for medical treatment</p>
            <p>This story of rescue was national news and made the front pages of many newspapers. The box of clippings and family memorabilia brings new meaning to Grandfather Harry’s recollections and the importance of struggling through any ‘storm.’ Digging
                deeper into this box, I also found a tattered copy of a Western Union telegram addressed to Harry while he was recovering at the Astoria Hospital. It was a message from his wife, Elsie, (my grandmother), still back in Portland. It simply
                read: Glad you are well –stop- Come home soon -stop- Bills need to be paid –stop.</p>
            <p>So much for Harry’s fifteen seconds of fame and his rescue from the Rock! In 1957 the lighthouse was decommissioned and the island sold.
            </p>
            <div class="row r2">
                <div class="col-lg-8 text-center">
                    <img src="{{asset('images/r2.jpg')}}" alt="">
                    <h3>Tilly Today, Tall, Proud & Strong </h3>
                </div>
                <div class="col-lg-4 text-center">
                    <img src="{{asset('images/r6.png')}}" alt="">
                    <h3>Award Wining Book Tillamook Rock Lighthouse</h3>
                </div>
            </div>
        </div>
    </section>





    <div class="newslatte-sec">
        <div class="container">
            <div class="newsletter_inner">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h2>Subscribe For Author News</h2>
                        <p>If you're like me and hate receiving a ton of emails, fear not.</p>
                    </div>
                    <div class="col-md-6">
                        <div class="news-latr-form">
                            <form action="#">
                                <input type="text" placeholder="Email Address">
                                <button class="btn-1">Subscribe <i class="fa-regular fa-arrow-right-long"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   @endsection