<?php
class AdminMenu
{
    public static $options = [
        'pages' => [
            'title' => 'Pages',
            'link' => 'pages',
            'icon' => 'icon-note',
            'selection' => ['pageSummary', 'editPage', 'pageSectionSummary', 'pageSectionEdit', 'pageImageSummary', 'addPageImage', 'addPageImage'],
            'children' => [
            ]
        ],
        'faq_categories' => [
            'title'       => 'Faq Categories',
            'link'        => 'faq-categories',
            'icon'        => 'icon-grid',
            'selection'  => ['faqCategoriesSummary','faqCategoriesAdd','faqCategoriesEdit'],
            'children'  =>  [
            ]
        ],
        'faqs' => [
            'title'       => 'Faqs',
            'link'        => 'faqs',
            'icon'        => 'glyphicon glyphicon-question-sign',
            'selection'  => ['faqsSummary','faqsAdd','faqsEdit'],
            'children'  =>  [
            ]
        ],
        'testimonials' => [
            'title'       => 'Testimonials',
            'link'        => 'testimonials',
            'icon'        => 'fa fa-quote-left',
            'selection'  => ['testimonialsSummary','addTestimonial','editTestimonial'],
            'children'  =>  [
            ]
        ],        
        'teams' => [
            'title'       => 'Teams',
            'link'        => 'teams',
            'icon'        => 'fa fa fa-users',
            'selection'  => ['teamSummary','addTeamMember','editTeamMember'],
            'children'  =>  [
            ]
        ],
        'graphics' => [
                'title'     => 'Graphics',
                'link'      => 'graphics',
                'icon'      => 'glyphicon glyphicon-picture',
                'selection' => ['graphicSummary','addGraphic','editGraphic'],
                'children'  => [
                ]
        ],
        'portfolios' => [
            'title'     => 'Portfolios',
            'link'      => 'portfolios',
            'icon'      => 'fa fa-briefcase',
            'selection' => ['portfolioSummary','addPortfolio','editPortfolio'],
            'children'  => [
            ]
        ],
        'enquiries' => [
            'title'     => 'Enquiries',
            'link'      => 'enquiries',
            'icon'      => 'fa fa-envelope',
            'selection' => ['enquiriesSummary'],
            'children'  => [
            ]
        ],
        'subscriptions' => [
            'title'     => 'Subscriptions',
            'link'      => 'subscriptions',
            'icon'      => 'fa fa-bell',
            'selection' => ['subscriptionsSummary'],
            'children'  => [
            ]
        ],
        'modules' => [
            'title'     => 'Modules',
            'link'      => 'modules',
            'icon'      => 'icon-note',
            'selection' => ['modulesSummary','editModule'],
            'children'  => [
            ]
        ],
        'settings' => [
            'title'       => 'Settings',
            'link'        => 'settings/1',
            'icon'        => 'fa fa-cog',
            'selection'  => ['changeSettings'],
            'children'  =>  [
            ]
        ],
    ];

}