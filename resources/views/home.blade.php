@extends('layouts.master')
@section('content')

<div class="wrapper col1">
    <div id="header">
        <div id="topnav">
            <ul>
                <li class="last"><a href="#">Link text</a><span>Test Text Here</span></li>
                <li><a href="#">DropDown</a><span>Test Text Here</span>
                    <ul>
                        <li><a href="#">Link 1</a></li>
                        <li><a href="#">Link 2</a></li>
                        <li><a href="#">Link 3</a></li>
                    </ul>
                </li>
                <li><a href="pages/full-width.html">Full Width</a><span>Test Text Here</span></li>
                <li><a href="pages/style-demo.html">Style Demo</a><span>Test Text Here</span></li>
                <li class="active"><a href="index.html">Homepage</a><span>Test Text Here</span></li>
            </ul>
        </div>
        <div id="logo">
            <h1><a href="index.html"><strong>O</strong>st <strong>M</strong>agazine</a></h1>
            <p>Free Website Template</p>
        </div>
        <br class="clear" />
    </div>
</div>

<div class="wrapper col2">
    <div id="featured_slide">
        <div class="featured_box">
            <div class="floater">
                <h2>1. Aliquatjusto quisque nam</h2>
                <p>Orcimagna rhoncus et a nec antesque sed temportor pellus nibh conseque. Accumstsemper wisi
                    pretium feugiat non ut eleifendrerisque at et condisse sce.</p>
            </div>
            <p class="readmore"><a href="#">Continue Reading &raquo;</a></p>
            <img src="images/930x375.gif" alt="" />
        </div>
        <div class="featured_box">
            <div class="floater">
                <h2>2. Aliquatjusto quisque nam</h2>
                <p>Duisvest lacus pellus purus temper maurisus et sodalesuada loreet sapiente et. Quissociis magnisl
                    orci dui nulla ut antesque malesuada sed pede et.</p>
            </div>
            <p class="readmore"><a href="#">Continue Reading &raquo;</a></p>
            <img src="images/930x375.gif" alt="" />
        </div>
        <div class="featured_box">
            <div class="floater">
                <h2>3. Dapiensociis temper donec</h2>
                <p>Pharetiumurna habitur et enim pellentesque phasellus aliquam nunc quis justo nam. Lobortororci
                    dapibulum ac intesquet ut id sed intesque nec alique.</p>
            </div>
            <p class="readmore"><a href="#">Continue Reading &raquo;</a></p>
            <img src="images/930x375.gif" alt="" />
        </div>
        <div class="featured_box">
            <div class="floater">
                <h2>4. Dapiensociis temper donec</h2>
                <p>Pharetiumurna habitur et enim pellentesque phasellus aliquam nunc quis justo nam. Lobortororci
                    dapibulum ac intesquet ut id sed intesque nec alique.</p>
            </div>
            <p class="readmore"><a href="#">Continue Reading &raquo;</a></p>
            <img src="images/930x375.gif" alt="" />
        </div>
        <div class="featured_box">
            <div class="floater">
                <h2>5. Nullain convallis ris elis</h2>
                <p>Nullamcorpervivamus nisl in sed adipit donec feugiat lor vel velit volutpat. Wisihabitur diculisi
                    ac curabitur cursuspendreris sociis sed eger ipsum.</p>
            </div>
            <p class="readmore"><a href="#">Continue Reading &raquo;</a></p>
            <img src="images/930x375.gif" alt="" />
        </div>
    </div>
</div>

<div class="wrapper col3">
    <div class="container">
        <div class="content">
            <div id="topstory">
                <h2>Feugiatrutrum rhoncus semper</h2>
                <ul>
                    @foreach($news as $post)
                <li style="margin-right:0;"><img src="{{$post->image}}" alt="" width="190" height="130"/>
                        <h3>{{$post->title}}</h3>
                        <p>{!! $post->content!!}</p>

                <p class="readmore"><a href="{{route('prikazi-vijest',['id'=>$post->id])}}">Continue Reading &raquo;</a></p>
                    </li>
                    @endforeach
                </ul>
                <br class="clear" />
            </div>
            <div id="latestnews">
                <h2>Feugiatrutrum rhoncus semper</h2>
                <ul>
                    <li>
                        <div class="imgholder"><img src="images/imgl.gif" alt="" /></div>
                        <div class="latestnews">
                            <h2>About This Template !</h2>
                            <p>This is a W3C standards compliant free website template from <a
                                    href="http://www.os-templates.com/">OS Templates</a>. This template is
                                distributed using a <a href="http://www.os-templates.com/template-terms">Website
                                    Template Licence</a>, which allows you to use and modify the template for both
                                personal and commercial use when you keep the provided credit links in the footer.
                                For more CSS templates visit <a href="http://www.os-templates.com/">Free Website
                                    Templates</a>.</p>
                            <p class="readmore"><a href="#">Continue Reading &raquo;</a></p>
                        </div>
                        <br class="clear" />
                    </li>
                    <li class="last">
                        <div class="imgholder"><img src="images/imgl.gif" alt="" /></div>
                        <div class="latestnews">
                            <h2>Indonectetus facilis leo nibh</h2>
                            <p>Attincidunt vel nam a maurisus lacinia consectetus magnisl sed ac morbi. Inmaurisus
                                habitur pretium eu et ac vest penatibus id lacus parturpis. Maecenaset adipiscinia
                                tellentum nullam velit et a convallis curabitae vitae laoreet niseros ligula sem sed
                                susp en at.</p>
                            <p class="readmore"><a href="#">Continue Reading &raquo;</a></p>
                        </div>
                        <br class="clear" />
                    </li>
                </ul>
            </div>
        </div>
        <div class="column">
            <div class="sponsors">
                <h2>Site Sponsors</h2>
                <div class="b_250"><a href="#"><img src="images/250x250.gif" alt="" /></a></div>
                <div class="b_125">
                    <ul>
                        <li><a href="#"><img src="images/125x125.gif" alt="" /></a></li>
                        <li><a href="#"><img src="images/125x125.gif" alt="" /></a></li>
                        <li><a href="#"><img src="images/125x125.gif" alt="" /></a></li>
                        <li><a href="#"><img src="images/125x125.gif" alt="" /></a></li>
                        <li><a href="#"><img src="images/125x125.gif" alt="" /></a></li>
                        <li class="last"><a href="#"><img src="images/125x125.gif" alt="" /></a></li>
                    </ul>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
        <br class="clear" />
    </div>
</div>

@endsection
