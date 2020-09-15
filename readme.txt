=== Advanced Custom Fields: Typography Field ===
Contributors: lordealeister
Tags: typography, acf, advanced custom fields, addon, admin, field, custom, custom field, acf typography
Requires at least: 3.5.0
Tested up to: 5.2
Stable tag: 3.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A Typography Add-on for the Advanced Custom Fields Plugin.

== Description ==

Typography field type for "Advanced Custom Fields" plugin that lets you add different text properties e.g. Font Size, Font Color etc.

= Version 3.0.0 Introduces =
> - Plugin functions and shortcode to fetch properties

= Supported Subfields =
* Font Size
* Font Weight
* Font Style
* Font Variant
* Font Stretch
* Line Height
* Letter Spacing
* Text Align
* Text Color
* Text Decoration
* Text Transform

= Other Features =
* Option to show/hide each subfield individually
* Option to make each subfield required individually
* Color Picker for Text Color subfield

= Documentation =
`
// Returns the value of a specific property
get_typography_field( $selector, $property, [$post_id], [$format_value] );

// Displays the value of a specific property
the_typography_field( $selector, $property, [$post_id], [$format_value] );

// Returns the value of a specific property from a sub field.
get_typography_sub_field( $selector, $property, [$format_value] );

// Displays the value of a specific property from a sub field.
the_typography_sub_field( $selector, $property, [$format_value] );
`

= Shortcode =
`[acf_typography field="field-name" property="font_size" post_id="123" format_value="1"]`

= [Github repository](https://github.com/lordealeister/acf-typography) =

= Compatibility =

This ACF field type is compatible with:
* Free and paid versions of the ACF plugin

== Installation ==

1. Copy the `acf-typography-field` folder into your `wp-content/plugins` folder
2. Activate the Typography plugin via the plugins admin page
4. Create a new field via ACF and select the Typography type
5. Please refer to the description for more info regarding the field type settings

== Changelog ==
= 3.0.0 =
* [NEW] Introduces functions and shortcode
* [NEW] Hides nonselected properties in fieldgroup edit page

= 2.2.0 =
* [NEW] Font Stretch subfield

= 2.1.0 =
* [NEW] Font Variant subfield

= 2.0.0 =
* [NEW] Now supports ACF 5 (Pro version)

= 1.1.1 =
* Fixed a bug

= 1.1.0 =
* [NEW] Text Transform subfield

= 1.0.0 =
* Initial Release.