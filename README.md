# Tailwind usage in the wild

This is a naive research about [Tailwind](https://tailwindcss.com/) usage in the wild. 

The purpose of it was to estimate the most effective order of tailwind utilities
in [Headsail](https://github.com/zipavlin/headsail) package, based on amount of utilities actually used.

## Commands
1. `php artisan collect` - collects projects from [buildwithtailwind website](https://builtwithtailwind.com/)
2. `php artisan start` - starts parsing urls collected with `collect` command
3. `php artisan add <url>` - adds url to collection
4. `php artisan count` - counts used tailwind utilities (gives results)

## How to run
1. Clone this repo
2. Set up a database and set connection in `.env` file.  
Then either import populated database found [here](https://drive.google.com/file/d/1GMTWEUu_Wp0wLQ-PLe8c4gVEiFA1FPlV/view?usp=sharing) (~ 200 MB) or:
1. Run `php artisan migrate` 
2. Run `php artisan collect`
3. Run `php artisan start`
4. Go grab a coffee/tea/beer/something, as this may take some time :)

## Notice
Have in mind that this is __not__ a scientific research. It is a project quickly put together to count usage in the wild. 
Maximum crawled pages for a single domain was set to 10 in the middle of collecting. This means that there is not an uniform
amount of pages from a single domain being used. Parser is using the latest version of Tailwind definition available at the
time of writing (1.8.10).

## Results
Results are based on 1922 crawled pages.

| Tailwind utility         | Parser utility used                                  | Count  |
|--------------------------|------------------------------------------------------|--------|
| Margin                   | Zipavlin\Headwind\Utilities\Margin                   | 159817 |
| Padding                  | Zipavlin\Headwind\Utilities\Padding                  | 159259 |
| Display                  | Zipavlin\Headwind\Utilities\Display                  | 84072  |
| TextColor                | Zipavlin\Headwind\Utilities\TextColor                | 70145  |
| Width                    | Zipavlin\Headwind\Utilities\Width                    | 62575  |
| Flex                     | Zipavlin\Headwind\Utilities\Flex                     | 49286  |
| FontSize                 | Zipavlin\Headwind\Utilities\FontSize                 | 45637  |
| BackgroundColor          | Zipavlin\Headwind\Utilities\BackgroundColor          | 34445  |
| BorderColor              | Zipavlin\Headwind\Utilities\BorderColor              | 31245  |
| FontWeight               | Zipavlin\Headwind\Utilities\FontWeight               | 31021  |
| Position                 | Zipavlin\Headwind\Utilities\Position                 | 24715  |
| TextAlignment            | Zipavlin\Headwind\Utilities\TextAlignment            | 24634  |
| Height                   | Zipavlin\Headwind\Utilities\Height                   | 23356  |
| BorderRadius             | Zipavlin\Headwind\Utilities\BorderRadius             | 23171  |
| AlignItems               | Zipavlin\Headwind\Utilities\AlignItems               | 20346  |
| LineHeight               | Zipavlin\Headwind\Utilities\LineHeight               | 18090  |
| TopRightBottomLeft       | Zipavlin\Headwind\Utilities\TopRightBottomLeft       | 14261  |
| TextDecoration           | Zipavlin\Headwind\Utilities\TextDecoration           | 13203  |
| TextTransform            | Zipavlin\Headwind\Utilities\TextTransform            | 12842  |
| JustifyContent           | Zipavlin\Headwind\Utilities\JustifyContent           | 12579  |
| GridColumnStartEnd       | Zipavlin\Headwind\Utilities\GridColumnStartEnd       | 12471  |
| Opacity                  | Zipavlin\Headwind\Utilities\Opacity                  | 9371   |
| TransitionProperty       | Zipavlin\Headwind\Utilities\TransitionProperty       | 8252   |
| Overflow                 | Zipavlin\Headwind\Utilities\Overflow                 | 7792   |
| BorderWidth              | Zipavlin\Headwind\Utilities\BorderWidth              | 7172   |
| ZIndex                   | Zipavlin\Headwind\Utilities\ZIndex                   | 7000   |
| MaxWidth                 | Zipavlin\Headwind\Utilities\MaxWidth                 | 6996   |
| BoxShadow                | Zipavlin\Headwind\Utilities\BoxShadow                | 6914   |
| TransitionDuration       | Zipavlin\Headwind\Utilities\TransitionDuration       | 6704   |
| TransitionTimingFunction | Zipavlin\Headwind\Utilities\TransitionTimingFunction | 6387   |
| Fill                     | Zipavlin\Headwind\Utilities\Fill                     | 6220   |
| Outline                  | Zipavlin\Headwind\Utilities\Outline                  | 6070   |
| Floats                   | Zipavlin\Headwind\Utilities\Floats                   | 5877   |
| ListStyleType            | Zipavlin\Headwind\Utilities\ListStyleType            | 4804   |
| Container                | Zipavlin\Headwind\Utilities\Container                | 4446   |
| Translate                | Zipavlin\Headwind\Utilities\Translate                | 4202   |
| LetterSpacing            | Zipavlin\Headwind\Utilities\LetterSpacing            | 3669   |
| VerticalAlignment        | Zipavlin\Headwind\Utilities\VerticalAlignment        | 2629   |
| Cursor                   | Zipavlin\Headwind\Utilities\Cursor                   | 2438   |
| Whitespace               | Zipavlin\Headwind\Utilities\Whitespace               | 2418   |
| GradientColorStops       | Zipavlin\Headwind\Utilities\GradientColorStops       | 1854   |
| ScreenReaders            | Zipavlin\Headwind\Utilities\ScreenReaders            | 1661   |
| ObjectFit                | Zipavlin\Headwind\Utilities\ObjectFit                | 1547   |
| MinHeight                | Zipavlin\Headwind\Utilities\MinHeight                | 1031   |
| WordBreak                | Zipavlin\Headwind\Utilities\WordBreak                | 990    |
| BackgroundImage          | Zipavlin\Headwind\Utilities\BackgroundImage          | 926    |
| BackgroundClip           | Zipavlin\Headwind\Utilities\BackgroundClip           | 923    |
| GridTemplateColumns      | Zipavlin\Headwind\Utilities\GridTemplateColumns      | 915    |
| Stroke                   | Zipavlin\Headwind\Utilities\Stroke                   | 893    |
| FontFamily               | Zipavlin\Headwind\Utilities\FontFamily               | 802    |
| Order                    | Zipavlin\Headwind\Utilities\Order                    | 734    |
| FontSmoothing            | Zipavlin\Headwind\Utilities\FontSmoothing            | 712    |
| Gap                      | Zipavlin\Headwind\Utilities\Gap                      | 664    |
| MinWidth                 | Zipavlin\Headwind\Utilities\MinWidth                 | 644    |
| AlignContent             | Zipavlin\Headwind\Utilities\AlignContent             | 606    |
| SpaceBetween             | Zipavlin\Headwind\Utilities\SpaceBetween             | 536    |
| FontStyle                | Zipavlin\Headwind\Utilities\FontStyle                | 509    |
| Appearance               | Zipavlin\Headwind\Utilities\Appearance               | 447    |
| BackgroundPosition       | Zipavlin\Headwind\Utilities\BackgroundPosition       | 391    |
| TableLayout              | Zipavlin\Headwind\Utilities\TableLayout              | 359    |
| AlignSelf                | Zipavlin\Headwind\Utilities\AlignSelf                | 307    |
| Scale                    | Zipavlin\Headwind\Utilities\Scale                    | 295    |
| MaxHeight                | Zipavlin\Headwind\Utilities\MaxHeight                | 275    |
| BackgroundSize           | Zipavlin\Headwind\Utilities\BackgroundSize           | 256    |
| UserSelect               | Zipavlin\Headwind\Utilities\UserSelect               | 214    |
| ObjectPosition           | Zipavlin\Headwind\Utilities\ObjectPosition           | 192    |
| Visibility               | Zipavlin\Headwind\Utilities\Visibility               | 186    |
| GridRowStartEnd          | Zipavlin\Headwind\Utilities\GridRowStartEnd          | 143    |
| Rotate                   | Zipavlin\Headwind\Utilities\Rotate                   | 91     |
| TransitionDelay          | Zipavlin\Headwind\Utilities\TransitionDelay          | 65     |
| TransformOrigin          | Zipavlin\Headwind\Utilities\TransformOrigin          | 47     |
| Animation                | Zipavlin\Headwind\Utilities\Animation                | 18     |
| ListStylePosition        | Zipavlin\Headwind\Utilities\ListStylePosition        | 9      |
| JustifySelf              | Zipavlin\Headwind\Utilities\JustifySelf              | 9      |
| DivideWidth              | Zipavlin\Headwind\Utilities\DivideWidth              | 8      |
| DivideColor              | Zipavlin\Headwind\Utilities\DivideColor              | 6      |
| Skew                     | Zipavlin\Headwind\Utilities\Skew                     | 5      |
| GridTemplateRows         | Zipavlin\Headwind\Utilities\GridTemplateRows         | 3      |
| Resize                   | Zipavlin\Headwind\Utilities\Resize                   | 2      |
| BoxSizing                | Zipavlin\Headwind\Utilities\BoxSizing                | 2      |
| BackgroundAttachment     | Zipavlin\Headwind\Utilities\BackgroundAttachment     | 2      |
| GridAutoFlow             | Zipavlin\Headwind\Utilities\GridAutoFlow             | 2      |
| BorderCollapse           | Zipavlin\Headwind\Utilities\BorderCollapse           | 1      |
| PlaceholderColor         | Zipavlin\Headwind\Utilities\PlaceholderColor         | 1      |

## Models
Data is divided in 3 models: 
- Page (a webpage with a unique url)
- Node (html node)
- Property (properties tied to a single html class, can be tailwind utility or custom class)

## Contributions
If you decide to use it and are able to extrapolate some additional information/data, please create a PR with results :)
