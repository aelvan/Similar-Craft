# Similar plugin for Craft CMS

Similar for Craft lets you find elements, Entries, Categories, Commerce Products, etc, that are similar, based on... other related elements. 

# Installation
1. Download the zip from this repository, unzip, and put the `similar` folder in your Craft plugin folder.
2. Enable the plugin in Craft (Settings > Plugins)

The Similar plugin now available for use in your templates.

# Usage
The plugin has one template method, `find`, which takes a parameters object with two required parameters, `element` and `context`. To find entries that are similar to `entry`, based on its tags in the Tagtag field `entry.tags`:

    {% set similarEntriesByTags = craft.similar.find({ element: entry, context: entry.tags }) %}
    <ul>
    {% for similarEntry in similarEntriesByTags %}
        <li>{{ similarEntry.title }} ({{ similarEntry.count }} tags in common)</li>
    {% endfor %}
    </ul>
    
There is also a third, optional parameter that you probably would want to use most of the time, `criteria`. `criteria` lets you create the base ElementCriteriaModel that Similar will extend, giving you the ability to use all of Craft's usual goodies for your queries. If you'd want to limit the number of entries returned (good idea!), you could do it like this:

    {% set limitCriteria = craft.entries.limit(4) %}
    {% set similarEntriesByTags = craft.similar.find({ element: entry, context: entry.tags, criteria: limitCriteria }) %}
    
    <ul>
    {% for similarEntry in similarEntriesByTags %}
        <li>{{ similarEntry.title }} ({{ similarEntry.count }} tags in common)</li>
    {% endfor %}
    </ul>

The supported element types are `Entry`, `Asset`, `Category`, `Tag`, `User` and `Commerce_Product`. If you miss one, send me a feature request.

The `context` parameter takes either an `ElementCriteriaModel`, or a list of ids. If you want to find similar entries based on an entry's tags and categories, you could do:

    {% set ids = entry.tags.ids() | merge(entry.categories.ids()) %}
    {% set limitCriteria = craft.entries.limit(4) %}
    {% set similarEntriesByTagsAndCategories = craft.similar.find({ element: entry, context: ids, criteria: limitCriteria }) %}

The returned model will be an extended version of the model of the element type you supplied. In the above examples where similar entries are returned, a `Similar_SimilarEntryModel` which extends `EntryModel` will be returned, giving you all the methods and properties of `EntryModel` in addition to `count` which indicates how many relations the entries had in common.

# Matrix gotcha
Similar will not take relations inside Matrix blocks into account. 

# Price, license and support
The plugin is released under the MIT license, meaning you can do what ever you want with it as long as you don't blame me. **It's free**, which means there is absolutely no support included, but you might get it anyway. Just post an issue here on github if you have one, and I'll see what I can do. :)

# Changelog
### Version 1.0.0
 - Initial Public Release.