@extends('layouts.main')

@section('content')
    <section class="story-sec">

        <div class="container">

            <div class="story_heading">
                <div class="row align-items-center">
                    <div class="col-lg-6 text-center">
                        <h2>Give ’em Hell, Harry</h2>
                        <h3>by Brian D. Ratty <br> ©2022
                        </h3>
                    </div>
                    <div class="col-lg-6">
                        <img src="{{asset('images/harry1.png')}}" alt="">
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

            <p>Recently, 65 nationally acclaimed historians came out with their annual ratings for America’s best presidents. Abraham Lincoln topped the list again, followed by George Washington, Franklin D. Roosevelt, Theodore Roosevelt and Harry S. Truman.
                If you had a chance to sit down and talk to one of these great men, what would you say? What would you ask? Well, I had just such an opportunity, and here’s my story.</p>
            <p>In the spring of 1961, having just been detached from active duty with the US Air Force, I was traveling home to Portland, Oregon, from Denver, Colorado. The United Airlines flight that I boarded, that fine spring day, had originated in Chicago,
                with stops at Denver, Portland and the final destination, Seattle.</p>
            <div class="stroy_center_image text-center mx-3">
                <img src="{{asset('images/h2.png')}}" alt="">
            </div>
            <p>Moving up the outside boarding ladder, dressed in my blue Airman 2nd Class uniform, I entered the DC-8 jetliner through the center fuselage door. As I made my way down the center aisle, I found the plane about half full and began looking for
                my assigned seat. As luck would have it, I found my window seat just over one of the wings, next to a young sailor also in uniform. As the aircraft prepared for takeoff, the Navy guy and I made small talk, and boy did we have a lot to
                talk about: John F. Kennedy had been sworn in as the 35th President (1961-1963), a few months before. Already, our country had witnessed the dismal failure of the Bay of Pigs invasion in Cuba, and was now facing a missile crisis with Russia.
                These were hot topics for two servicemen, at the time. </p>
            <p>As the plane reached its cruising altitude, I began noticing an unusual number of coach passengers passing through the draped doorway to the foreword first class compartment, each returning a few moments later. <br> Turning to the sailor I
                asked, “What’s all the action, up front?” <br> “Harry Truman is up there. He got on in Chicago.” <br> “We should go shake his hand,” I replied. <br> With a scowl on his face, he answered, “I wouldn’t walk across aisle for that SOB!”</p>
            <div class="stroy_center_image text-center mx-3">
                <img src="{{asset('images/h3.png')}}" alt="">
                <h3>The Buck Stops Here!</h3>
            </div>
            <p>Former President, Harry S. Truman, (1945-1953), had finished his term little more than eight years before, at the low ebb of his popularity. He had been blamed for many things…but in the end he had been proven right about almost everything.
                This was the President who had a plaque on his Oval Office desk that read, ‘The Buck Stops Here,’ and he was known for his ‘Give ’em Hell’ attitude. I had always liked him! “Well, I’m going to shake his hand. Never met a President before.
                You sure you won’t come?” Pushing his Dixie cup hat lower down his forehead, the sailor shook his head no.</p>
            <p>I was nervous as I approached the draped doorway, but being in uniform gave me solace. Pulling the cloth back, I found a small First Class compartment with a pair of double seats facing each other on both sides. There were only two men in
                the entire compartment. On my right, facing me, was a large fellow dressed in a business suit, staring at my every move. He had to be Secret Service. On my left, also facing me, was the former President of the United States. I was overwhelmed
                with pride and scared to death! His face looked older and more tired than I remembered it from his photographs. <br> With my hand outstretched, I took a few steps and simply said, “Mr. President I, would like to shake your hand.” When
                he looked up from the magazine he was reading, a broad, warm smile raced across his face. Extending his hand, he replied, “Airman, I would like to shake yours.” <br> His handshake was firm and solid for a seventy-seven year old man. Nodding
                towards the empty seat in front of him, he continued, “Sit down Airman. Let’s talk.” <br> It took a second for my knees to stop shaking and start bending. Sitting down on the edge of the seat in front of him, I asked, “Mr. President, where
                are you going today?” <br> With his blue eyes peering into my soul, he answered, “Have to make a speech up in Seattle, but that’s not important. Where are you going, Airman?”</p>
            <p>That’s how it started. I asked him another four or five simple questions. He answered all my queries but always turned the conversation back to me. “Where you from, son?...Do you like the Air Force?...What do you do in the Air Force?...Are
                you married or have a girlfriend?” Always the conversation came back to me! But it was more than that: it was the way he looked at me, as if I were the most important person on the plane. It was also his eyes, bright and alert, always
                seeming to pierce through to my soul.</p>
            <p>I would like to say we talked for half-an-hour, but I’m sure it was only a few minutes. When I finally got my legs to work again and stood up to leave, he shook my hand again. <br> “Nice talking to you, Airman. God bless you.” <br> Looking
                into his steel-blue eyes for the last time, I knew I was in the presence of a great leader, as well as a famous President. <br> Walking back to my seat I couldn’t believe how fortunate I had been to meet the former President of the United
                States. I knew I would remember that brief encounter for the rest of my life, and here I am, writing about it almost fifty years later! Therefore, I was not surprised by the historians’ recent decision to name Harry S. Truman as one of
                this nation’s greatest Presidents. He was, and I had the honor to meet him</p>
            <div class="stroy_center_image text-center mx-3">
                <img src="{{asset('images/h4.png')}}" alt="">
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