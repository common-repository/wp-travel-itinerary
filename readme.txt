=== Plugin Name ===
Contributors: todsul
Donate link: http://globetrooper.com/
Tags: current location, travel, travel blog, travel schedule, travel itinerary, meetup, travel partners, backpacking
Requires at least: 2.8
Tested up to: 3.3
Stable tag: 1.1.5

Show your current location and travel schedule in the sidebar of your travel blog. Readers can propose meetups at each of your future destinations.

== Description ==

Home Page: http://globetrooper.com/notes/wordpress-world-travel-plugin/

With this plugin, you can do the following:

* Display your Current Location to readers
* Display your Travel Schedule to readers
* Allow readers to propose Meetups in each location

The mantra of Globetrooper is to help people travel the world together. And the purpose of our plugin 
is the same. Of course, as a travel blogger, it also makes sense to display your travel plans and 
meetup with readers around the globe.

View a LIVE demo of the plugin at http://globetrooper.com/notes/. You'll find the plugin in the sidebar under the 
heading 'Current Location'. Click the links in the widget to test the full functionality.


== Installation ==

1. Upload `wp-travel-itinerary.php` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Drag the widget into a sidebar through the 'Widgets' menu under 'Appearance' in WordPress

== Frequently Asked Questions ==

= How do I change my Current Location? =

In the WordPress dashboard you will find a menu for Schedule. That is where you can add your travel plans. The Current
Location is chosen from your future destinations. The plugin finds the location where the 'from' date is BEFORE today
and the 'to' date is AFTER today.

= How am I notified of proposed Meetups? =

All Meetups are recorded to WordPress so you can find them when you log into the Dashboard. You may also receive 
an email notification if your server is setup correctly. Also check you spam folders if you are not 
receiving the emails.


== Screenshots ==

1. Sidebar widget with Schedule opened.
2. Admin for Travel Schedule
3. Admin for proposed Meetups


== Changelog ==

= 1.1.4 =
* Now able to show previous places visited
* Now the schedule link is hidden in expanded view

= 1.1.1 =
* Now able to hide the Meetup link
* Non-English dates are working properly

= 1.0.8 =
* Fixed month name to match foreign locale

= 1.0.6 =
* Fixed widget title bug - you can now edit the title afterwards
* When you deactivate, the widget is now auto removed from your sidebar

= 1.0.5 =
* Fixed link bug

= 1.0.4 =
* Allowed user to specify country only (specific place/city not mandatory)

= 1.0.3 =
* Fixed default value for text links bug
* Fixed boolean settings update bug

= 1.0.2 =
* Check if schedule exists before displaying widget text
* Localize terms from WP core language files
* Ability to customise text in widget for terms not in WP core language files
* Now suitable for WP in other languages

= 1.0.1 =
* Fixed jQuery conflict
* Fixed Meetup heading pushing location box to next line
* Fixed email validation error

= 1.0.0 =
* This is the first release version.

== Upgrade Notice ==

= 1.1.2 =
* Schedule intro is now in a <p> tag
* Make sure spacing between intro and schedule is okay