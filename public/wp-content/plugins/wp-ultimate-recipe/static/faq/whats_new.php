<div class="changelog">
    <div>
        <p class="about-description">We keep working on WP Ultimate Recipe every single week. Find out what's new in our latest version.</p>
    </div>

    <hr />

    <div class="feature-section col two-col">
        <div class="col-1">
            <h3>WP Ultimate Recipe 3.2</h3>
            <strong>New</strong>
            <ul>
                <li>Feature: Use both JSON-LD and inline metadata at the same time</li>
                <li>Improvement: WordPress 4.6 compatibility</li>
                <li>Improvement: Immediately adjust print link on servings change</li>
                <li>Improvement: Apply content filter on recipe print page</li>
                <li>Improvement: Immediately adjust print link on servings change</li>
            </ul>
            <strong>Update</strong>
            <ul>
                <li>Fix: Prevent PHP notice when grid plugin is not activated</li>
                <li>Fix: Issue with resetting cache if it doesn't exist yet</li>
                <li>Fix: Prevent template issue with themes using a custom wpautop</li>
                <li>Fix: Prevent PHP 7 deprecation notices caused by Vafpress</li>
                <li>Fix: unwanted span elements when using the plain text import highlighter</li>
                <li>Fix: Issue with quotes in ingredient metadata</li>
                <li>Fix: Compatibility with latest AMP plugin version</li>
                <li>Fix: use ratingCount instead of reviewCount for JSON-LD metadata</li>
                <li>Fix: Issues with HTML entities in the recipe description</li>
            </ul>
        </div>
        <div class="col-2 last-feature">
            <h3>WP Ultimate Recipe Premium 3.2</h3>
            <strong>New</strong>
            <ul>
                <li>Feature: Print entire Meal Plan</li>
                <li>Feature: Add recipes as leftovers to the Meal Planner</li>
                <li>Feature: Set custom names for the Meal Planner courses</li>
                <li>Feature: Import XML to existing post ID</li>
                <li>Feature: Set post status for XML imported recipes</li>
                <li>Improvement: Show all recipes when creating a meal plan in the backend, not just published recipes</li>
                <li>Improvement: Import EasyRecipe author</li>
                <li>Improvement: Remove mentions of old Recipe Grid</li>
                <li>Improvement: setting to include Post ID in XML export</li>
            </ul>
            <strong>Update</strong>
            <ul>
                <li>Fix: Print template problem when custom template was selected for a recipe</li>
            </ul>
        </div>
    </div>

    <hr />

    <div>
        <h3>Previous Versions</h3>

        <h4>Premium Plugin 3.1</h4>
        <ul>
            <li>Feature: Change template for individual recipes</li>
            <li>Feature: Ability to use a different template for the recipe archive pages</li>
            <li>Improvement: Setting to set the number of days the dates change in the Meal Planner</li>
            <li>Improvement: Cache for recipes in Meal Planner dropdown</li>
            <li>Improvement: Setting to disable Recipe Grid plugin loading</li>
            <li>Improvement: set tag to use for Recipe Title</li>
            <li>Improvement: Use lowercase to compare nutritional information units</li>
            <li>Improvement: Setting to disable unit system selection in Meal Planner</li>
            <li>Fix: User ratings in Meal Planner details
            <li>Fix: Decimal issues in Meal Planner daily nutrition values
            <li>Fix: Use correct metadata for user ratings
            <li>Fix: Warning in User Menus form
            <li>Fix: Translate group by options in Meal Planner
            <li>Fix: Categories and tags when importing Cooked recipes
            <li>Fix: Unit system print issue with certain custom templates</li>
        </ul>
        <h4>Core Plugin 3.1</h4>
        <ul>
            <li>Feature: Use JSON-LD for recipe metadata</li>
            <li>Feature: Support for Google AMP Pages (Accelerated Mobile Pages)</li>
            <li>Improvement: Noindex for recipe print page</li>
            <li>Improvement: Better check for using prep and cook time metadata</li>
            <li>Improvement: add min="1" attribute to servings changer</li>
            <li>Improvement: Change decimal character in settings</li>
            <li>Improvement: Plugin hooks for recipe index shortcode</li>
            <li>Improvement: Divi Builder compatibility for recipes</li>
            <li>Improvement: Add fix for Genesis query bug</li>
            <li>Fix: Sanitize slug for custom taxonomies</li>
            <li>Fix: Prevent metadata issue when using Jetpack Photon</li>
            <li>Fix: Prevent conflicts with modals and select2</li>
        </ul>

        <h4>Premium Plugin 3.0</h4>
        <ul>
            <li>Feature: Show daily nutrition facts in the Meal Planner</li>
            <li>Feature: Email Meal Planner shopping list for easy access</li>
            <li>Feature: Create link to recipe with Recipe Link block in the Template Editor</li>
            <li>Feature: Import from Yummly Rich Recipes</li>
            <li>Improvement: Link to recipe in default Meal Planner template</li>
            <li>Improvement: Meal Planner date picker localization</li>
            <li>Improvement: Meal Planner plugin hooks</li>
            <li>Fix: Issue with User Menus servings on mobile</li>
            <li>Fix: Decimal servings in Meal Planner shopping list</li>
            <li>Fix: Issue with paragraphs in post content when importingEasy Recipe</li>
            <li>Fix: Links in tooltips bug</li>
        </ul>
        <h4>Core Plugin 3.0</h4>
        <ul>
            <li>Feature: New free recipe template</li>
            <li>Feature: Change template colors in the free version</li>
            <li>Feature: Import Recipe from Plain Text</li>
            <li>Feature: New free Print Template with Image</li>
            <li>Improvement: Better way of handling new print feature</li>
            <li>Improvement: Use fractions in recipe servings</li>
            <li>Improvement: Don’t load any assets in minimal mode</li>
            <li>Improvement: Plugin hooks for assets to load</li>
            <li>Improvement: WPML Compatibility</li>
            <li>Improvement: Various performance improvements for users with a large number of recipes</li>
            <li>Fix: Prevent the "Changes will be lost" message caused by the searchable recipes feature</li>
        </ul>

        <h4>Premium Plugin 2.8</h4>
        <ul>
            <li>Feature: Ability to save and display Meal Plans with a shortcode</li>
            <li>Feature: New Icon Block in the Template Editor</li>
            <li>Feature: Set default author for user submitted recipes by guests</li>
            <li>Improvement: Some new settings for the Meal Planner</li>
            <li>Improvement: Text-transform options in the Template Editor</li>
            <li>Improvement: Font-Awesome icons for Recipe Stars</li>
            <li>Improvement: Meal Planner weekdays not dependent on PHP language but translated automatically</li>
            <li>Fix: Problem with Unit Conversion when printing</li>
            <li>Fix: Meal Planner shopping list problem when using prefix in URL</li>
            <li>Fix: User submission with required name when user is already logged in</li>
        </ul>
        <h4>Core Plugin 2.8</h4>
        <ul>
            <li>Improvement: Ability to reset author star rating</li>
            <li>Improvement: Setting to use the legacy print feature if you’re experiencing issues</li>
            <li>Fix: Pinterest button problem</li>
            <li>Fix: No metadata for author rating, Google doesn’t like this anymore</li>
        </ul>

        <h4>Premium Plugin 2.7</h4>
        <ul>
            <li>Feature: Save Meal Planner shopping list for easy mobile usage</li>
            <li>Feature: Checkboxes in Meal Planner shopping list</li>
            <li>Feature: Limit recipes in Meal Planner</li>
            <li>Improvement: Better Meal Planner print styling for compatibility with all themes</li>
            <li>Fix: Meal Planner consolidate ingredients settings bug</li>
            <li>Fix: Use WordPress timezone for Meal Planner</li>
            <li>Fix: Better handling of tooltips in recipe grid</li>
        </ul>
        <h4>Core Plugin 2.7</h4>
        <ul>
            <li>Feature: Clean print links for recipes</li>
            <li>Improvement: Compatibility with WordPress REST API</li>
            <li>Improvement: use better thumbnails for instruction images</li>
            <li>Fix: Shortcode editor lightbox problem with some themes</li>
        </ul>
        <h4>Premium Plugin 2.6</h4>
        <ul>
            <li>Feature: Meal Planner</li>
            <li>Feature: Import recipes from Cooked plugin</li>
            <li>Feature: Ability to import ingredients with Nutritional Information from XML</li>
            <li>Improvement: WP Ultimate Post Grid Premium 1.8</li>
            <li>Improvement: Give priority to reference units in Nutritional calculations</li>
            <li>Improvement: Set default serving size display value for Nutritional Information</li>
            <li>Improvement: Ignore IP check for logged in users rating recipes</li>
            <li>Setting: Disable ratings on recipe overview page for performance</li>
            <li>Setting: Set Featured Image as required in User Submission form</li>
            <li>Fix: Unit conversion problem with non-latin characters</li>
            <li>Fix: Use Print Title setting when printing the shopping list</li>
        </ul>
        <h4>Core Plugin 2.6</h4>
        <ul>
            <li>Feature: Ability to define an alternate image for the recipe instead of the default featured image</li>
            <li>Improvement: WordPress 4.4 compatibility</li>
            <li>Setting: Choose alt tag for recipe and instruction images</li>
            <li>Setting: Ingredient quantities precision after changing servings</li>
            <li>Fix: Shortcode lightbox problem with some themes</li>
        </ul>

        <h4>Premium Plugin 2.5</h4>
        <ul>
            <li>Feature: Custom Recipe Tag Links</li>
            <li>Feature: Set serving size for nutritional information and display data for different sizes in the shortcode</li>
            <li>Feature: Limit recipes in User Menus by linking it to a Recipe Grid</li>
            <li>Feature: Filter Export XML Recipes by date and author</li>
            <li>Feature: Allow users to delete their own user submitted recipes when editing from the front-end</li>
            <li>Improvement: Try to match on reference amount for nutritional calculations</li>
            <li>Improvement: Show recipe being imported in Ziplist import</li>
            <li>Improvement: Filter for user menus redirects</li>
            <li>Setting: Change Nutritional Information display unit to kilojoules</li>
            <li>Setting: Disable featured image on recipe over page for performance boost</li>
            <li>Fix: Problem with Add to Shopping List Button when recipe was deleted from User Menus</li>
            <li>Fix: Link in email on User Submission when user is not logged in</li>
            <li>Fix: More recipes fit in the cookies for User Menus</li>
            <li>Fix: Correct serving size in printed user menu when the same recipe is used multiple times</li>
        </ul>
        <h4>Core Plugin 2.5</h4>
        <ul>
            <li>Improvement: Retina version of Pin It button</li>
            <li>Improvement: Support for Genesis Simple Sidebars</li>
            <li>Setting: Ignore Recipe IDs for compatibility with content copy plugins</li>
            <li>Setting: Disable autocomplete for ingredients</li>
            <li>Setting: Use hyphens for ranges in quantities</li>
            <li>Fix: Printed ingredient quantities when using decimals in your serving size</li>
            <li>Fix: Make sure Chicory code is not loaded by default</li>
            <li>Fix: Recipe image metadata</li>
            <li>Fix: Embedded media at the end of a recipe post not working</li>
            <li>Fix: Problem with wrong servings in print version after changing</li>
        </ul>

        <h4>Premium Plugin 2.4</h4>
        <ul>
            <li>Feature: Tooltip for Favorite Recipe button</li>
            <li>Feature: Tooltip for Add to Shopping List button</li>
            <li>Feature: Setting to show ingredient notes in shopping list</li>
            <li>Feature: Ability to show images in Recipe List Widget</li>
            <li>Feature: Setting to enable delete button for saved User Menus</li>
            <li>Feature: Setting to include list of recipes in the printed shopping list</li>
            <li>Feature: Custom Tag Conditions in the Template Editor</li>
            <li>Feature: Ability to list recipes submitted by current user in the Extended Recipe Index shortcode</li>
            <li>Feature: Recipe Date block in the Template Editor</li>
            <li>Feature: Post Content block in the Template Editor</li>
            <li>Feature: Cut off text after X characters or X words in the Template Editor</li>
            <li>Improvement: Usage of fractions in User Menus if enabled for adjustable servings</li>
            <li>Improvement: Add to Shopping List button will only add a recipe once and indicate if it’s already on the list</li>
            <li>Improvement: Set the required capability to edit Nutritional Information in the settings</li>
            <li>Improvement: User Submission form looks better on mobile</li>
            <li>Fix: Better cup unit conversions in User Menus</li>
            <li>Fix: Template editor when using unconventional WP directory structures</li>
            <li>Fix: Firefox letter spacing problem in User Submission dropdowns</li>
        </ul>
        <h4>Core Plugin 2.4</h4>
        <ul>
            <li>Feature: Yummly partner integration, enable the Yum button in the settings</li>
            <li>Feature: Tooltip for Print button</li>
            <li>Improvement: Better metadata for the Recipe Image</li>
            <li>Improvement: Better way of handling the searchable content</li>
            <li>Improvement: Output cook and prep time meta when using hours</li>
            <li>Improvement: New Food Fanatic button</li>
            <li>Fix: Excerpts on archive pages when there is no post content</li>
            <li>Fix: Don’t output link color when “Output Inline CSS” is disabled</li>
            <li>Fix: Shortcode Editor not working properly in some themes</li>
            <li>Fix: Serve Pinterest button image statically to prevent HTTPS issues</li>
        </ul>

        <h4>Premium Plugin 2.3</h4>
        <ul>
            <li>Feature: Import .fdx files (Living Cookbook, …)</li>
            <li>Feature: Allow logged in users to edit their own recipes from the front end with a new shortcode</li>
            <li>Feature: Allow visitors to preview recipes in the User Submission form</li>
            <li>Feature: Set required fields for User Submission form</li>
            <li>Feature: Use security question in User Submission form</li>
            <li>Improvement: More options for auto approval of User Submissions</li>
            <li>Improvement: Select which custom fields should show up in the User Submission form</li>
            <li>Improvement: User Submission form container classes</li>
            <li>Fix: Dropping in certain blocks after loading/importing in the Template Editor</li>
        </ul>
        <h4>Core Plugin 2.3</h4>
        <ul>
            <li>Feature: Full text search for recipes</li>
            <li>Feature: New partner integration with Chicory</li>
            <li>Setting: What to use for the recipe image title tag</li>
            <li>Fix: Password Protection now hides the recipe box as well</li>
            <li>Fix: Yandex resultPhoto metadata</li>
            <li>Fix: Usage of Ratings taxonomy</li>
        </ul>

        <h4>Premium Plugin 2.2.3</h4>
        <ul>
            <li>Feature: Entire new Recipe Grid functionality</li>
            <li>Improvement: Delete icon in User Menus</li>
            <li>Improvement: Setting to not consolidate ingredients in User Menus</li>
            <li>Fix: Publish date bug in saved User Menus</li>
            <li>Fix: Recipe Grid WordPress 4.2 compatibility</li>
            <li>Fix: Unit Conversion problem when switching back to original unit system</li>
        </ul>
        <h4>Core Plugin 2.2.3</h4>
        <ul>
            <li>Improvement: Plugin works in different directory names</li>
            <li>Fix: Shortcode Editor button in text editor</li>
            <li>Fix: Recipe Template compatibility with Twenty Fifteen theme</li>
        </ul>

        <h4>Premium Plugin 2.2.2</h4>
        <ul>
            <li>Feature: Favorite Recipes</li>
            <li>Improvement: Better recipe dropdown for Nutritional Information page</li>
            <li>Improvement: Setting to use rel=“nofollow” for custom links</li>
            <li>Improvement: Setting to disable Media Manager for logged in users on User Submission page</li>
            <li>Improvement: Import all recipes from other plugins, not just the published ones</li>
            <li>Fix: Problem with sub field conditions in tables, rows and columns</li>
            <li>Fix: XML import problem when importing multiple recipes with different fields</li>
        </ul>
        <h4>Core Plugin 2.2.2</h4>
        <ul>
            <li>Improvement: Setting to choose the source for the instruction images title tag</li>
        </ul>

        <h4>Premium Plugin 2.2.1</h4>
        <ul>
            <li>Feature: Separate share buttons in Template Editor</li>
            <li>Feature: New share buttons: Facebook Share, StumbleUpon, LinkedIn</li>
            <li>Feature: Multiselect terms in User Submission form</li>
            <li>Improvement: Show ungrouped ingredients first on Ingredient Groups page</li>
            <li>Improvement: Recipe Grid filters follow order used in shortcode</li>
            <li>Improvement: Use "pending review" instead of "draft" for user submitted recipes</li>
            <li>Improvement: New default User Menu name</li>
            <li>Improvement: Setting to disable Nutritional Information notice</li>
            <li>Improvement: Better way of saving custom recipe templates</li>
            <li>Fix: Order of terms in User Submission form</li>
        </ul>
        <h4>Core Plugin 2.2.1</h4>
        <ul>
            <li>Feature: Advanced ability to use plugin in minimal mode on certain pages</li>
            <li>Improvement: Better thumbnails for instruction images</li>
            <li>Improvement: Possibility to add Yandex resultPhoto meta field</li>
            <li>Improvement: Memory use of recipe templates</li>
            <li>Fix: Load Google Fonts over https when necessary</li>
        </ul>

        <h4>Premium Plugin 2.2</h4>
        <ul>
            <li>Feature: Define plural form of ingredients</li>
            <li>Feature: Export your recipes to XML</li>
            <li>Feature: Import recipes from XML</li>
            <li>Improvement: Nutrition Label block in Template Editor</li>
            <li>Improvement: Nutrition values as percentage of daily value available in Template Editor</li>
            <li>Improvement: Add instruction and ingredient groups in “Add new from text"</li>
            <li>Fix: Show delete button in User Menus on mobile devices</li>
            <li>Fix: Problem with unchecking “Hide ingredient link” option</li>
            <li>Fix: Metadata not shown in Recipe Grid or print version</li>
            <li>Fix: Don’t show nutritional metadata group when empty</li>
        </ul>
        <h4>Core Plugin 2.2</h4>
        <ul>
            <li>Improvement: Better handling of fractions in ingredient quantities</li>
            <li>Improvement: Compatibility with Term Management Tool</li>
            <li>Better schema.org compliance for metadata</li>
        </ul>

        <h4>Premium Plugin 2.1.8</h4>
        <ul>
            <li>Feature: Import from RecipeCard by Yumprint</li>
            <li>Fix: Template Editor preview problem with default permalinks</li>
        </ul>
        <h4>Core Plugin 2.1.8</h4>
        <ul>
            <li>Feature: BigOven integration</li>
            <li>Feature: Food Fanatic integration</li>
            <li>Feature: Support for YARPP</li>
            <li>Fix: JS error when using the minified assets</li>
            <li>Fix: PHP Warning on first time activation</li>
            <li>Fix: White screen on first time activation</li>
            <li>Fix: Template compatibility with new Twenty Fifteen theme</li>
        </ul>

        <h4>Premium Plugin 2.1.6</h4>
        <ul>
            <li>Feature: Add to Shopping List from Recipe</li>
            <li>Feature: Shopping List is persistent</li>
            <li>Feature: Sub field conditions in the Template Editor</li>
            <li>Feature: New “User Menus By” shortcode</li>
            <li>Feature: Custom HTML to display after a user has submitted a recipe</li>
            <li>Feature: Setting to hide specific category or tag terms on the User Submission page</li>
            <li>New hook: wpurp_recipe_grid_recipe_ids</li>
            <li>Fix: Number of recipes in Grid when not displaying those without image</li>
            <li>Fix: Nutritional Widget memory problem</li>
            <li>Fix: Don’t display ingredient and instruction subfields when empty</li>
        </ul>
        <h4>Core Plugin 2.1.6</h4>
        <ul>
            <li>Feature: Ability to chat with us from your Settings or FAQ page</li>
            <li>Fix: Issue in minified JS file causing problems on some websites</li>
        </ul>

        <h4>Premium Plugin 2.1.5</h4>
        <ul>
            <li>Feature: Ability to show multiple unit systems as columns in the shopping list</li>
            <li>Fix: Automatic updates should be working again for most users</li>
            <li>Fix: Unit Conversion problem</li>
            <li>Fix: User Ratings voting problem when using minified assets</li>
        </ul>
        <h4>Core Plugin 2.1.4</h4>
        <ul>
            <li>Fix: Problem with adjustable servings</li>
            <li>Fix: Use of non-gzipped minified assets to avoid PHP problems</li>
        </ul>

        <h4>Premium Plugin 2.1.4</h4>
        <ul>
            <li>Feature: Ability to add custom CSS for the shopping list print page</li>
            <li>Feature: Ability to set the default unit system for User Menus</li>
        </ul>

        <h4>Premium Plugin 2.1.3</h4>
        <ul>
            <li>Feature: Ability to not show an ingredient link for specific ingredients</li>
            <li>Feature: Checkboxes in the shopping list</li>
            <li>Improvement: New “Space” block in the Template Editor</li>
            <li>Fix: “Include List Tags” checkbox persistence in Template Editor</li>
        </ul>
        <h4>Core Plugin 2.1.3</h4>
        <ul>
            <li>Feature: Minified JS and CSS assets for improved page load speed</li>
            <li>Improvement: Better page load speed when using the Custom CSS setting</li>
            <li>Improvement: New default recipe and print template optimised for RTL languages</li>
            <li>Improvement: Ability to change sharing buttons language in the settings</li>
            <li>Improvement: Setting to disable the Recipe Archive page</li>
            <li>Fix: Issue when using decimal values as the serving size</li>
        </ul>

        <h4>Premium Plugin 2.1.2</h4>
        <ul>
            <li>Feature: Import from EasyRecipe and EasyRecipe Plus</li>
            <li>Improvement: List ZipList recipes that couldn’t be imported automatically</li>
            <li>Fix: NaN issue when calculating recipe nutritional information</li>
            <li>Fix: Recipe Search Widget when having a different site and home URL</li>
            <li>Fix: Recipe Grid CSS issue with some themes</li>
        </ul>
        <h4>Core Plugin 2.1.2</h4>
        <ul>
            <li>Feature: Compatibility with the Subscribe2 plugin</li>
            <li>Feature: Compatibility with the Paid Memberships Pro plugin</li>
            <li>Fix: Recipe Title will take over Post Title when intentionally left blank</li>
            <li>Fix: Memory issue for shortcode editor when having a large amount of recipes</li>
            <li>Fix: Improved CPU load should increase site speed</li>
        </ul>

        <h4>Premium Plugin 2.1.1</h4>
        <ul>
            <li>Feature: Import Ziplist recipes</li>
            <li>Improvement: Posibility to add content to saved User Menus</li>
            <li>Fix: Saved User Menus not displaying on some themes</li>
            <li>Fix: Shopping List title in User Menus shortcode</li>
            <li>Fix: Check for recipe rating in Template Editor condition</li>
        </ul>
        <h4>Core Plugin 2.1.1</h4>
        <ul>
            <li>Improvement: Serving size doesn't need to be a number anymore (but still recommended!)</li>
            <li>Fix: Recipe images title tag problem</li>
            <li>Fix: Compatibility problem with some front-end templating tools</li>
        </ul>

        <h4>Premium Plugin 2.1.0</h4>
        <ul>
            <li>Feature: Nutritional Information</li>
            <li>Feature: Possibility to print the entire User Menu</li>
            <li>Setting: Hide custom tags from the Recipe Box</li>
            <li>Setting: Hide custom tags from User Submission</li>
            <li>Hook: wpurp_output_recipe_print_user_menus</li>
            <li>Update: New version of EDD plugin updater</li>
            <li>Fix: JS errors in Template Editor</li>
            <li>Fix: Shopping List title in User Menus shortcode</li>
            <li>Fix: Check for recipe rating in Template Editor condition</li>
        </ul>
        <h4>Core Plugin 2.1.0</h4>
        <ul>
            <li>Feature: New FAQ page with Getting Started information</li>
            <li>Feature: WPML Configuration file for multilingual support</li>
            <li>Setting: Output recipes in RSS Feed</li>
            <li>Improvement: Use alt and title tags as defined by user for instruction and recipe images</li>
            <li>Improvement: New icon for Shortcode Editor and settings</li>
            <li>Fix: Issue with saving settings</li>
            <li>Fix: Recipe Notes styling of hr tag and image alignment</li>
            <li>Fix: Ability to use strong and italic text in instructions again</li>
            <li>Fix: Apply shortcodes in print template</li>
            <li>Fix: Problem with buttons in settings after changing websites</li>
        </ul>

        <h4>Premium Plugin 2.0.10</h4>
        <ul>
            <li>Feature: New HTML & Shortcodes block in the Template Editor</li>
            <li>Feature: Show featured image in admin overview</li>
            <li>Feature: Display specific user menu with a new shortcode</li>
            <li>Setting: Disable access to media in User Submission form</li>
            <li>Setting: Round up user rating shown in metadata</li>
            <li>Improvement: Easier to change user menus serving size on mobile</li>
            <li>Fix: Show Import from Text link to editors and up</li>
            <li>Fix: Styling for Template Editor paragraph block</li>
            <li>Compatibility Fix: Option Tree Plugin</li>
        </ul>
        <h4>Core Plugin 2.0.10</h4>
        <ul>
            <li>Improvement: Show recipe rating in metadata</li>
            <li>Setting: Use fractions after changing serving size</li>
            <li>Fix: Title tag for recipe instruction images</li>
        </ul>

        <h4>Premium Plugin 2.0.9</h4>
        <ul>
            <li>Feature: Ability to automatically crop recipe images in the Template Editor</li>
            <li>Feature: Admin email notification on user submission</li>
            <li>Fix: Improved print page unit conversion</li>
            <li>Fix: Export Template functionality should work in all browsers now</li>
            <li>Fix: Recipe Search widget compatibility with some themes</li>
        </ul>
        <h4>Core Plugin 2.0.9</h4>
        <ul>
            <li>Fix: All dashes are now treated as ranges for calculations</li>
            <li>Fix: Recipe box for multipage posts</li>
            <li>Fix: Recipe_title metadata problem in some cases</li>
            <li>Fix: Recipe excerpt on archive pages</li>
            <li>Fix: Correct WPML language when using ajax calls</li>
            <li>Fix: WPML adjacent posts fix</li>
            <li>Fix: Instruction images lightbox link</li>
            <li>Fix: Only hide thumbnails in the loop to not mess with widgets</li>
        </ul>

        <h4>Premium Plugin 2.0.8</h4>
        <ul>
            <li>Ability to change Recipe Tags, Ingredients and Instructions in the Template Editor</li>
            <li>New WPURP Recipe Search widget</li>
            <li>New WPURP Recipe List widget</li>
            <li>Import from Text is now available to anyone who is allowed to edit posts, not just administrators</li>
            <li>Ability to pick a template in the Recipe Grid shortcode</li>
            <li>Updated EDD update mechanism</li>
            <li>Fixed Template Editor load order</li>
            <li>Fixed adjustable quantities when using decimals</li>
            <li>New hook: wpurp_user_menus_form</li>
        </ul>
        <h4>Core Plugin 2.0.8</h4>
        <ul>
            <li>Fixed CSS and JS problem on settings page for some users</li>
            <li>Fixed recipe metadata</li>
            <li>New hook: wpurp_query_posts_loop_check</li>
            <li>New hook: wpurp_recipe_content_loop_check</li>
        </ul>

        <h4>Premium Plugin 2.0.7</h4>
        <ul>
            <li>New Custom Fields feature</li>
            <li>Fixed NaN quantities in print version</li>
            <li>Sharing buttons should now work in the Recipe Grid</li>
            <li>Ability to change RSS feed template in the Template Editor</li>
            <li>Group by category or tag in the Extended Recipe Index shortcode</li>
        </ul>
        <h4>Core Plugin 2.0.7</h4>
        <ul>
            <li>Fixed 'Force CSS Style' setting for link colors</li>
            <li>Include translations in external folder if present</li>
            <li>New RSS feed template</li>
            <li>Tested WordPress 4.0 compatibility</li>
            <li>New hook: wpurp_check_for_shortcode</li>
        </ul>

        <h4>Premium Plugin 2.0.6</h4>
        <ul>
            <li>User menus fix</li>
            <li>Fix for problem with non-latin characters</li>
            <li>Media editor fix for post types without featured image</li>
            <li>New hook: wpurp_user_submissions_form</li>
            <li>New hook: wpurp_register_menu_post_type</li>
        </ul>
        <h4>Core Plugin 2.0.6</h4>
        <ul>
            <li>Translation updates</li>
            <li>Fix for recipe thumbnail resizing in some themes</li>
            <li>Fixed metadata</li>
            <li>Sharing buttons overflow fix</li>
            <li>Updated VafPress to latest version</li>
            <li>Improved Recipe Notes styling</li>
            <li>RTL support on recipe print page</li>
            <li>New hook: wpurp_query_posts</li>
        </ul>

        <h4>Premium Plugin 2.0.5</h4>
        <ul>
            <li>Actually fixed the Template Editor button this time</li>
            <li>Custom Style properties for the Template Editor (add class name and/or custom inline CSS)</li>
            <li>Improved Recipe Grid: faster and AJAX load. Possibility to limit recipes shown on first page.</li>
            <li>Moved Recipe Grid settings to shortcode.</li>
        </ul>
        <h4>Core Plugin 2.0.5</h4>
        <ul>
            <li>CSS table fix</li>
        </ul>

        <h4>Core Plugin 2.0.4</h4>
        <ul>
            <li>Fixed settings page bug</li>
        </ul>

        <h4>Premium Plugin 2.0.3</h4>
        <ul>
            <li>Fixed Template Editor button</li>
            <li>Fix for recalculating Recipe Grid terms</li>
            <li>Easier to change font size in Template Editor</li>
            <li>New Recipe Link block in Template Editor</li>
            <li>New Date block in Template Editor</li>
        </ul>
        <h4>Core Plugin 2.0.3</h4>
        <ul>
            <li>Fixed problems with print version</li>
            <li>Added multiple plugin hooks</li>
            <li>Keep fractions after changing serving size</li>
        </ul>

        <h4>Core Plugin 2.0.2</h4>
        <ul>
            <li>Fixed translations for RTL languages</li>
        </ul>

        <h4>Premium Plugin 2.0.1</h4>
        <ul>
            <li>Some Template Editor fixes</li>
            <li>Fix for recalculating Recipe Grid terms</li>
        </ul>
        <h4>Core Plugin 2.0.1</h4>
        <ul>
            <li>Fixed translations</li>
            <li>Recipe Index fix for non-latin letters</li>
        </ul>

        <h4>Premium Plugin 2.0</h4>
        <ul>
            <li>No more need for the core plugin to use WP Ultimate Recipe Premium</li>
            <li>New <strong>Template Editor</strong> allows you to create and adjust recipe, print and recipe grid templates in a user-friendly interface</li>
            <li>Choose the template you want when inserting recipes with the shortcode</li>
            <li>Support for multiple Recipe Grids on a single page</li>
            <li>Improved Recipe Grid speed</li>
            <li>Sort Recipe Grid by Recipe Rating</li>
            <li>Restrict ingredient input for User Submission to a dropdown of existing ingredients</li>
            <li>Hierarchical dropdown for categories and tags in User Submission form</li>
            <li>Ability to <strong>clone recipes</strong> from the recipe overview page</li>
        </ul>
        <h4>Core Plugin 2.0</h4>
        <ul>
            <li>Language updates</li>
            <li>Default template will be more consistent in different themes</li>
            <li>Completely restructured code of the core plugin allows for easier modifications and faster development</li>
            <li>Clarifications for the correct way of entering ingredients</li>
            <li>Demo Recipe included to show the correct way of entering recipes</li>
            <li>Added setting to add Recipe Shortcode Editor to other custom post types</li>
            <li>Possibility to adjust the mobile breakpoint, based on recipe box width</li>
            <li>Advanced setting to remove the recipe slug in URLs</li>
        </ul>

        <hr/>

        <h4>Core Plugin 1.0.12</h4>
        <ul>
            <li>WordPress 3.9 compatibility (just increased the version number, everthing was already compatible).</li>
            <li>Language updates</li>
            <li>Plugin now supports custom fields and publicize shortlinks</li>
            <li>Fix: Recipes respect the more tag now</li>
        </ul>
        <h4>Core Plugin 1.0.11</h4>
        <ul>
            <li>Ability to add custom CSS from the recipe settings.</li>
        </ul>
        <h4>Premium Plugin 1.0.8</h4>
        <ul>
            <li>Customize the print template (add your own logo!)</li>
            <li>Import plain text recipes (beta version)</li>
            <li>Ability to reset User Ratings</li>
            <li>Ability to define minimum # votes before sharing the user rating with search engines</li>
        </ul>
        <h4>Premium Plugin 1.0.7</h4>
        <ul>
            <li>Added setting: enable or disable user menus save.</li>
            <li>Added setting: define singular and plural form for converted unit.</li>
            <li>Fix: Logged in users can now use the modal when submitting recipes</li>
        </ul>
        <h4>Premium Plugin 1.0.6</h4>
        <ul>
            <li>Extended shortcode options for the Recipe Grid. For example: show the grid for 1 specific category.</li>
            <li>Fix: User conversion should work better in some specific cases</li>
        </ul>
        <h4>Core Plugin 1.0.9</h4>
        <ul>
            <li>Free text field for recipe times. You're not limited to minutes anymore.</li>
            <li>Fix: CSS media queries</li>
        </ul>
        <h4>Premium Plugin 1.0.5</h4>
        <ul>
            <li>Advanced Unit Conversion settings</li>
            <li>Redesigned User Menus - Dynamically change serving size per ingredient, group ingredients, change unit system, ...</li>
            <li>Fix: Only show tags and categories that actually have recipes in the Recipe Grid</li>
        </ul>
        <h4>Core Plugin 1.0.8</h4>
        <ul>
            <li>Recipes now support Jetpack Publicize feature</li>
            <li>Added French translations</li>
            <li>Conflict fix for print button</li>
            <li>Servings now change on keyUp</li>
        </ul>
        <h4>Premium Plugin 1.0.4</h4>
        <ul>
            <li>Multiselect for the Recipe Grid</li>
        </ul>
        <h4>Core Plugin 1.0.7</h4>
        <ul>
            <li>Fix: Schema.org/Recipe format: added author and fixed whitespaces</li>
            <li>Fix: Share buttons layout</li>
            <li>Fix: Migration error</li>
            <li>Fix: Recipe Notes newlines</li>
        </ul>
        <h4>Premium Plugin 1.0.3</h4>
        <ul>
            <li>Convert between Imperial and Metric units</li>
            <li>List all recipes by author</li>
        </ul>
        <h4>Core Plugin 1.0.6</h4>
        <ul>
            <li>Fix: Recipe notes newlines work nows</li>
            <li>Fix: AutoSuggest ingredient should hide now</li>
            <li>Fix: Recipes as posts integration fixes</li>
        </ul>
        <h4>Premium Plugin 1.0.1</h4>
        <ul>
            <li>Draw attention to the possibility to vote for recipes</li>
            <li>Recipe Grid included in shortcode editor</li>
        </ul>
        <h4>Core Plugin 1.0.1</h4>
        <ul>
            <li>Use your recipes just like normal posts</li>
            <li>Contact support directly from Recipe Admin page</li>
            <li>General Bug Fixes</li>
        </ul>
        <h4>Premium Plugin 1.0.0</h4>
        <ul>
            <li>Custom ingredient links (great for affiliate marketing)</li>
            <li>Let your users rate your recipes</li>
            <li>Advanced usage of WP categories and tags</li>
        </ul>
        <h4>Core Plugin 1.0.0</h4>
        <ul>
            <li>Structure your ingredients and instructions in groups</li>
            <li>Make your images clickable (use it in combination with a lightbox plugin!)</li>
            <li>Disable ingredient links</li>
            <li>Shareable recipes (Facebook, Twitter, Google Plus & Pinterest)</li>
        </ul>
        <h4>Core Plugin 0.0.22</h4>
        <ul>
            <li>Use the default WP categories and tags for your recipes (see General Settings)</li>
            <li>Added "Passive Time" to indicate time that doesn't require active cooking like marinating or time in the oven</li>
        </ul>
        <h4>Premium Plugin 0.0.9</h4>
        <ul>
            <li>Ability to import ReciPress recipes</li>
        </ul>
        <h4>Core Plugin 0.0.21</h4>
        <ul>
            <li>New recipe admin page (the one you're looking at!)</li>
            <li>New shortcode generator (click the chef's icon in the post or page editor!)</li>
        </ul>
    </div>
</div>