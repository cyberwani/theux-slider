=== TheUx Slider ===

Tags: slider, parallax, slideshow   
Requires at least: 3.5.1   
Tested up to: 3.6   
Stable tag: 1.0.0   
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

TheUx Slider is a real world responsive, unbranded, premium and open source slider.

== Description ==

TheUx Slider is a premium slider with a twist. No tricks, no lite version, no ads, no donation buttons, no backlinks and no brand. A clean and robust premium slider that is 100% open source and full of features that are only found on those paid sliders. Pay no more!

= Features =

*   TheUx Serie.
*   100% Responsive.
*   Animate multiple elements.
*   Full control over each element.
*   Unlimited elements.
*   Unlimited slides.
*   Group elements in steps.
*   Slideshows! Organize your slides into multiple slideshows.
*   Easy theme integration.
*   No fancy UI.
*   Low learning curve.
*   Drag-and-drop image uploading.
*   No settings page!
*   OOP approach.
*   Singleton free!!
*   and much more!


= TheUx Serie =

TheUx is a premium open source series of WordPress plugins. More than a well crafted code, our signature is to be an unbranded plugin. No lite version, no ads, no donation buttons, no backlinks and no fancy UI. TheUx series use the standard WordPress UI and coding convention. It's a real premium plugin for free.


== Installation ==

1. Upload `theux-slider` directory to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress

= Adding TheUx Slider =

It's very easy to include the slider on your theme. Just use the following shortcode on any page/post.

    [theux_slider]

Playing with the parameters:

    [theux_slider dimensions="900,300" autochange=true pauseonhover=true]


To use shortcode within a PHP file (outside the post editor).
     
     <?php echo do_shortcode('[theux_slider]'); ?>


**Available parameters and their default values**

    slideshow: '',
    controls: true,
    pager: false,
    autochange: true,
    pauseonhover: false,
    slideendanimation: false
    backgroundanimation: false
    backgroundx: 500
    backgroundy: 500
    backgroundspeed: 2500
    backgroundease: 'easeOutCubic'   
    fullwidth: true,
    responsive: true,
    dimensions: '',
    increase: false,
      
   
    
== Screenshots ==

1. Slides listing page.
2. Slide elements page.
3. Slideshow settings.



== Frequently Asked Questions ==

Please go ahead and read this FAQ to understand more about TheUX Slider philosophy.


= What is the TheUx Slider goal?

The TUS (TheUx Slider) goal is to be the main slider of your website and not jack of 
all trades slider. 


= Why doesn't TUS have a settings page?

TUS was designed with the Single Responsibility Principle in mind. And for that, you 
don't need that many options. All the options you need you to SET UP the slider you
pass on shortcode. The options used on the SLIDES are defined when you add or edit them.


= But if I need more sliders, will I need to install a second slider pluing for that? =

This answer will sound a bit weird, but stay with me. 

Really? Do you really need to have more than one slider per website? Yes, I wrote website and not 
page. Please don't make that mistake. By nature, most of sliders sucks [Sliders Suck](http://krogsgard.com/2013/sliders-suck)

= WTF??? =

Let me put this way. Sliders are fancy animations that most of the time are there just a distract the 
user, and not to make any real convertion. As any UI element on your website, the slider must have a 
reason to exist. Putting it there just for esthetic purpose may hurt your website convertion and distracting
the visitors for complete your goals. The rule of thumb is: if the slider is part of your website strategie
and its serve a specific goal, no worries. Go for it! Otherwise, I strongly suggest you to rethink its use. 

= Ok, I'm sold. Just out of curiosity, why did you write this plugin then? =

Come on..it's fun. Don't agree? 

1. Learning is my main reason. TheUx Slider is real plugin. It has OOP, PHP, JS, WP plugins development..and so on.
All the things you need to improve your skills. 

1. I want people to be aware about the this slider fever. It's unbelievable that people are paying for 'premium' sliders.
Not only that, it's a common practice for 'premium themes' to include two, three or even four different sliders. I don't 
know if it's only me, but that is nonsense.


== Acknowledges ==

 This plugin only exists because of some amazing people out there and their wonderful work. Special thanks to:

* Gijs Jorissen - [Wordpress-Cuztom-Helper](http://https://github.com/Gizburdt/Wordpress-Cuztom-Helper)
* Mario Jäckle - [FractionSlider](http://http://jacksbox.de/stuff/jquery-fractionslider/)


== Change Log ==

= 1.0.0 =

* First release of TheUx Slider.


== License ==
	
	Copyright 2013 Daniel Zilli

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301 USA
