<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Public routes goes here...
Route::get('/', 'Frontend\PagesController@home');


//Route::get('/user/createRoles', 'Auth\AuthController@createRoles');
//Route::get('/user/createUsers', 'Auth\AuthController@createUsers');

//Public routes goes here...
Route::get('admin', 'Auth\AuthController@login');
Route::post('login', 'Auth\AuthController@login');
Route::get('logout', 'Auth\AuthController@logout');

//Routes that only allows to administrator
Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function()
{
    //Pages
    Route::get('pages', 'Admin\PagesController@index')->name('pageSummary');
    Route::any('ajax-pages', 'Admin\PagesController@ajaxIndex');
    Route::any('pages/edit/{id}', 'Admin\PagesController@edit')->name('editPage');
    
    //Page Sections Routes
    Route::get('page-sections/{page}', 'Admin\PageSectionsController@index')->name('pageSectionSummary');
    Route::any('ajax-page-sections/{page}', 'Admin\PageSectionsController@ajaxIndex');
    Route::any('page-section/edit/{section_id}', 'Admin\PageSectionsController@edit')->name('pageSectionEdit');
    
    //Page Images Routes
    Route::get('page-images/{page_id}', 'Admin\PageImagesController@index')->name('pageImageSummary');
    Route::any('page-image/add/{page_id}', 'Admin\PageImagesController@add')->name('addPageImage');
    Route::any('page-image/edit/{page_id}/{id}', 'Admin\PageImagesController@edit')->name('addPageImage');
    
    //settings routes
    Route::any('settings/{id}', 'Admin\SettingsController@changesettings')->name('changeSettings');
    
    //Faqs
    Route::get('faqs', 'Admin\FaqsController@index')->name('faqsSummary');
    Route::any('ajax-faqs', 'Admin\FaqsController@ajaxIndex');
    Route::any('faqs/add', 'Admin\FaqsController@add')->name('faqsAdd');
    Route::any('faq/edit/{id}', 'Admin\FaqsController@edit')->name('faqsEdit');
    Route::any('faq/delete/{id}', 'Admin\FaqsController@deleteFaq')->name('deleteFaq');

    //Faq Categories
    Route::get('faq-categories', 'Admin\FaqCategoriesController@index')->name('faqCategoriesSummary');
    Route::any('ajax-faq-categories', 'Admin\FaqCategoriesController@ajaxIndex');
    Route::any('faq-category/add', 'Admin\FaqCategoriesController@add')->name('faqCategoriesAdd');
    Route::any('faq-category/edit/{id}', 'Admin\FaqCategoriesController@edit')->name('faqCategoriesEdit');
    Route::any('faq-category/delete/{id}', 'Admin\FaqCategoriesController@deleteFaqCategory')->name('deleteFaqCategory');

    //Testimoial Routes
    Route::get('testimonials', 'Admin\TestimonialsController@index')->name('testimonialsSummary');
    Route::any('ajax-testimonials', 'Admin\TestimonialsController@ajaxIndex');
    Route::any('testimonial/add', 'Admin\TestimonialsController@add')->name('addTestimonial');
    Route::any('testimonial/edit/{id}', 'Admin\TestimonialsController@edit')->name('editTestimonial');
    Route::any('testimonial/delete/{id}', 'Admin\TestimonialsController@deleteTestimonial')->name('deleteTestimonial');
    Route::any('testimonial/toggle/status/{model}/{status}', 'Admin\TestimonialsController@toggleStatus');

    //Team Routes
    Route::get('teams', 'Admin\TeamsController@index')->name('teamSummary');
    Route::any('ajax-team', 'Admin\TeamsController@ajaxIndex');
    Route::any('team/add', 'Admin\TeamsController@add')->name('addTeamMember');
    Route::any('team/edit/{id}', 'Admin\TeamsController@edit')->name('editTeamMember');
    Route::any('team/delete/{id}', 'Admin\TeamsController@deleteTeam')->name('deleteTeamMember');
    Route::any('team/toggle/status/{model}/{status}', 'Admin\TeamsController@toggleStatus');
    
    //Graphics
    Route::get('graphics', 'Admin\GraphicsController@index')->name('graphicSummary');
    Route::any('ajax-graphics', 'Admin\GraphicsController@ajaxIndex');
    Route::any('graphics/add', 'Admin\GraphicsController@add')->name('addGraphic');
    Route::any('graphics/edit/{id}', 'Admin\GraphicsController@edit')->name('editGraphic');
    Route::any('graphics/delete/{id}', 'Admin\GraphicsController@delete');
    Route::any('graphics/toggle/status/{model}/{status}', 'Admin\GraphicsController@toggleStatus');
    
    //Portfolios Routes
    Route::get('portfolios', 'Admin\PortfoliosController@index')->name('portfolioSummary');
    Route::any('ajax-portfolio', 'Admin\PortfoliosController@ajaxIndex');
    Route::any('portfolio/add', 'Admin\PortfoliosController@add')->name('addPortfolio');
    Route::any('portfolio/edit/{id}', 'Admin\PortfoliosController@edit')->name('editPortfolio');
    Route::any('portfolio/delete/{id}', 'Admin\PortfoliosController@deletePortfolio')->name('deletePortfolio');
    
    //Enquiries Routes
    Route::get('enquiries', 'Admin\EnquiriesController@index')->name('enquiriesSummary');
    Route::any('ajax-enquiries', 'Admin\EnquiriesController@ajaxIndex');
    Route::any('enquiry/delete/{id}', 'Admin\EnquiriesController@deleteEnquiry');
    
    //Subscriptions Routes
    
    Route::get('subscriptions', 'Admin\SubscriptionsController@index')->name('subscriptionsSummary');
    Route::any('ajax-subscriptions', 'Admin\SubscriptionsController@ajaxIndex');
    Route::any('subscription/delete/{id}', 'Admin\SubscriptionsController@deleteSubscription');
    
    //Modules
    Route::get('modules', 'Admin\ModulesController@index')->name('modulesSummary');
    Route::any('ajax-modules', 'Admin\ModulesController@ajaxIndex');
    Route::any('module/edit/{id}', 'Admin\ModulesController@edit')->name('editModule');
    
    //auth related routes
    Route::any('change-password', 'Auth\AuthController@change_password')->name('changePassword');
});

//Routes with slug needs to be at the bottom
Route::any('/faq', 'Frontend\FaqsController@index');
Route::get('/testimonial', 'Frontend\testimonialsController@index');
Route::get('/portfolio/detail/{id}', 'Frontend\PortfoliosController@detail');
Route::any('/contact', 'Frontend\PagesController@contactUs');
Route::any('/subscription/{email}', 'Controller@subscribe');
Route::get('/{slug}', 'Frontend\PagesController@page');


