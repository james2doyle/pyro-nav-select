pyro-nav-select
===============

Assign any navigation group to a page.

## How It Works

The fields returns a dropdown of all the Navigation groups on your site.

"Header" navigation group output example:

```
array(
    'id' => 1,
    'title' => 'Header',
    'slug' => 'header'
);
```

## How To Use

### Basics

* Rename this folder to `nav_select`
* Add the field type as you would normally
* Choose "Navigation Select" as the type
* Enjoy it on a page

### In the layout

This field returns an array for the navigation group that you selected. Here is the basic usage.

```html
<!-- make sure the choice was not set to "None" -->
{{ if page:field_slug }}
    <h4>{{ page:field_slug:title }}</h4>
    <ul class="side-nav primary">
        {{ navigation:links group=page:field_slug:slug }}
    </ul>
{{ endif }}
```

