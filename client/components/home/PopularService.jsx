import React, { useEffect } from 'react'

const PopularService = () => {

    return (
        <section className="popular-services">
            <div className="container">
                <div className="row">
                    <div className="col-lg-12">
                        <div className="row">
                            <div className="col-md-6">
                                <div className="heading aos" data-aos="fade-up">
                                    <h2>Most Popular Services</h2>
                                    <span>Explore the greates our services. You won’t be disappointed</span>
                                </div>
                            </div>
                            <div className="col-md-6">
                                <div className="viewall aos" data-aos="fade-up">
                                    <h4><a href="categories.html">View All <i className="fas fa-angle-right" /></a></h4>
                                    <span>Most Popular</span>
                                </div>
                            </div>
                        </div>
                        <div className="service-carousel">
                            {/* <div className="service-slider owl-carousel owl-theme"> */}
                            <div className="service-slider owl-carousel owl-theme aos" data-aos="fade-up">
                                <div className="service-widget">
                                    <div className="service-img">
                                        <a href="service-details.html">
                                            <img className="img-fluid serv-img" alt="Service Image" src="assets/img/services/service-01.jpg" />
                                        </a>
                                        <div className="fav-btn">
                                            <a href="javascript:void(0)" className="fav-icon">
                                                <i className="fas fa-heart" />
                                            </a>
                                        </div>
                                        <div className="item-info">
                                            <div className="service-user">
                                                <a href="#">
                                                    <img src="assets/img/customer/user-01.jpg" alt />
                                                </a>
                                                <span className="service-price">$25</span>
                                            </div>
                                            <div className="cate-list">
                                                <a className="bg-yellow" href="service-details.html">Cleaning</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div className="service-content">
                                        <h3 className="title">
                                            <a href="service-details.html">Toughened Glass Fitting Services</a>
                                        </h3>
                                        <div className="rating">
                                            <i className="fas fa-star filled" />
                                            <i className="fas fa-star filled" />
                                            <i className="fas fa-star filled" />
                                            <i className="fas fa-star filled" />
                                            <i className="fas fa-star" />
                                            <span className="d-inline-block average-rating">(4.3)</span>
                                        </div>
                                        <div className="user-info">
                                            <div className="row">
                                                <span className="col-auto ser-contact"><i className="fas fa-phone me-1" />
                                                    <span>xxxxxxxx49</span>
                                                </span>
                                                <span className="col ser-location">
                                                    <span>Wayne, New Jersey</span> <i className="fas fa-map-marker-alt ms-1" />
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div className="service-widget">
                                    <div className="service-img">
                                        <a href="service-details.html">
                                            <img className="img-fluid serv-img" alt="Service Image" src="assets/img/services/service-02.jpg" />
                                        </a>
                                        <div className="fav-btn">
                                            <a href="javascript:void(0)" className="fav-icon">
                                                <i className="fas fa-heart" />
                                            </a>
                                        </div>
                                        <div className="item-info">
                                            <div className="service-user">
                                                <a href="#">
                                                    <img src="assets/img/customer/user-02.jpg" alt />
                                                </a>
                                                <span className="service-price">$50</span>
                                            </div>
                                            <div className="cate-list">
                                                <a className="bg-yellow" href="service-details.html">Automobile</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div className="service-content">
                                        <h3 className="title">
                                            <a href="service-details.html">Car Repair Services</a>
                                        </h3>
                                        <div className="rating">
                                            <i className="fas fa-star filled" />
                                            <i className="fas fa-star filled" />
                                            <i className="fas fa-star filled" />
                                            <i className="fas fa-star filled" />
                                            <i className="fas fa-star filled" />
                                            <span className="d-inline-block average-rating">(5)</span>
                                        </div>
                                        <div className="user-info">
                                            <div className="row">
                                                <span className="col-auto ser-contact"><i className="fas fa-phone me-1" /> <span>xxxxxxxx85</span></span>
                                                <span className="col ser-location"><span>Hanover, Maryland</span>  <i className="fas fa-map-marker-alt ms-1" /></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div className="service-widget">
                                    <div className="service-img">
                                        <a href="service-details.html">
                                            <img className="img-fluid serv-img" alt="Service Image" src="assets/img/services/service-03.jpg" />
                                        </a>
                                        <div className="fav-btn">
                                            <a href="javascript:void(0)" className="fav-icon">
                                                <i className="fas fa-heart" />
                                            </a>
                                        </div>
                                        <div className="item-info">
                                            <div className="service-user">
                                                <a href="#">
                                                    <img src="assets/img/customer/user-03.jpg" alt />
                                                </a>
                                                <span className="service-price">$45</span>
                                            </div>
                                            <div className="cate-list">
                                                <a className="bg-yellow" href="service-details.html">Electrical</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div className="service-content">
                                        <h3 className="title">
                                            <a href="service-details.html">Electric Panel Repairing Service</a>
                                        </h3>
                                        <div className="rating">
                                            <i className="fas fa-star filled" />
                                            <i className="fas fa-star filled" />
                                            <i className="fas fa-star filled" />
                                            <i className="fas fa-star filled" />
                                            <i className="fas fa-star" />
                                            <span className="d-inline-block average-rating">(4.5)</span>
                                        </div>
                                        <div className="user-info">
                                            <div className="row">
                                                <span className="col-auto ser-contact"><i className="fas fa-phone me-1" /> <span>xxxxxxxx30</span></span>
                                                <span className="col ser-location"><span>Kalispell, Montana</span>  <i className="fas fa-map-marker-alt ms-1" /></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div className="service-widget">
                                    <div className="service-img">
                                        <a href="service-details.html">
                                            <img className="img-fluid serv-img" alt="Service Image" src="assets/img/services/service-04.jpg" />
                                        </a>
                                        <div className="fav-btn">
                                            <a href="javascript:void(0)" className="fav-icon">
                                                <i className="fas fa-heart" />
                                            </a>
                                        </div>
                                        <div className="item-info">
                                            <div className="service-user">
                                                <a href="#">
                                                    <img src="assets/img/customer/user-04.jpg" alt />
                                                </a>
                                                <span className="service-price">$14</span>
                                            </div>
                                            <div className="cate-list">
                                                <a className="bg-yellow" href="service-details.html">Car Wash</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div className="service-content">
                                        <h3 className="title">
                                            <a href="service-details.html">Steam Car Wash</a>
                                        </h3>
                                        <div className="rating">
                                            <i className="fas fa-star" />
                                            <i className="fas fa-star" />
                                            <i className="fas fa-star" />
                                            <i className="fas fa-star" />
                                            <i className="fas fa-star" />
                                            <span className="d-inline-block average-rating">(0)</span>
                                        </div>
                                        <div className="user-info">
                                            <div className="row">
                                                <span className="col-auto ser-contact"><i className="fas fa-phone me-1" /> <span>xxxxxxxx74</span></span>
                                                <span className="col ser-location"><span>Electra, Texas</span>  <i className="fas fa-map-marker-alt ms-1" /></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div className="service-widget">
                                    <div className="service-img">
                                        <a href="service-details.html">
                                            <img className="img-fluid serv-img" alt="Service Image" src="assets/img/services/service-05.jpg" />
                                        </a>
                                        <div className="fav-btn">
                                            <a href="javascript:void(0)" className="fav-icon">
                                                <i className="fas fa-heart" />
                                            </a>
                                        </div>
                                        <div className="item-info">
                                            <div className="service-user">
                                                <a href="#">
                                                    <img src="assets/img/customer/user-05.jpg" alt />
                                                </a>
                                                <span className="service-price">$100</span>
                                            </div>
                                            <div className="cate-list">
                                                <a className="bg-yellow" href="service-details.html">Cleaning</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div className="service-content">
                                        <h3 className="title">
                                            <a href="service-details.html">House Cleaning Services</a>
                                        </h3>
                                        <div className="rating">
                                            <i className="fas fa-star" />
                                            <i className="fas fa-star" />
                                            <i className="fas fa-star" />
                                            <i className="fas fa-star" />
                                            <i className="fas fa-star" />
                                            <span className="d-inline-block average-rating">(0)</span>
                                        </div>
                                        <div className="user-info">
                                            <div className="row">
                                                <span className="col-auto ser-contact"><i className="fas fa-phone me-1" /> <span>xxxxxxxx91</span></span>
                                                <span className="col ser-location"><span>Sylvester, Georgia</span>  <i className="fas fa-map-marker-alt ms-1" /></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div className="service-widget">
                                    <div className="service-img">
                                        <a href="service-details.html">
                                            <img className="img-fluid serv-img" alt="Service Image" src="assets/img/services/service-06.jpg" />
                                        </a>
                                        <div className="fav-btn">
                                            <a href="javascript:void(0)" className="fav-icon">
                                                <i className="fas fa-heart" />
                                            </a>
                                        </div>
                                        <div className="item-info">
                                            <div className="service-user">
                                                <a href="#">
                                                    <img src="assets/img/customer/user-06.jpg" alt />
                                                </a>
                                                <span className="service-price">$80</span>
                                            </div>
                                            <div className="cate-list">
                                                <a className="bg-yellow" href="service-details.html">Computer</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div className="service-content">
                                        <h3 className="title">
                                            <a href="service-details.html">Computer &amp; Server AMC Service</a>
                                        </h3>
                                        <div className="rating">
                                            <i className="fas fa-star" />
                                            <i className="fas fa-star" />
                                            <i className="fas fa-star" />
                                            <i className="fas fa-star" />
                                            <i className="fas fa-star" />
                                            <span className="d-inline-block average-rating">(0)</span>
                                        </div>
                                        <div className="user-info">
                                            <div className="row">
                                                <span className="col-auto ser-contact"><i className="fas fa-phone me-1" /> <span>xxxxxxxx92</span></span>
                                                <span className="col ser-location"><span>Los Angeles, California</span>  <i className="fas fa-map-marker-alt ms-1" /></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div className="service-widget">
                                    <div className="service-img">
                                        <a href="service-details.html">
                                            <img className="img-fluid serv-img" alt="Service Image" src="assets/img/services/service-07.jpg" />
                                        </a>
                                        <div className="fav-btn">
                                            <a href="javascript:void(0)" className="fav-icon">
                                                <i className="fas fa-heart" />
                                            </a>
                                        </div>
                                        <div className="item-info">
                                            <div className="service-user">
                                                <a href="#">
                                                    <img src="assets/img/customer/user-07.jpg" alt />
                                                </a>
                                                <span className="service-price">$5</span>
                                            </div>
                                            <div className="cate-list">
                                                <a className="bg-yellow" href="service-details.html">Interior</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div className="service-content">
                                        <h3 className="title">
                                            <a href="service-details.html">Interior Designing</a>
                                        </h3>
                                        <div className="rating">
                                            <i className="fas fa-star filled" />
                                            <i className="fas fa-star filled" />
                                            <i className="fas fa-star filled" />
                                            <i className="fas fa-star filled" />
                                            <i className="fas fa-star" />
                                            <span className="d-inline-block average-rating">(4)</span>
                                        </div>
                                        <div className="user-info">
                                            <div className="row">
                                                <span className="col-auto ser-contact"><i className="fas fa-phone me-1" /> <span>xxxxxxxx28</span></span>
                                                <span className="col ser-location"><span>Hanover, Maryland</span>  <i className="fas fa-map-marker-alt ms-1" /></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div className="service-widget">
                                    <div className="service-img">
                                        <a href="service-details.html">
                                            <img className="img-fluid serv-img" alt="Service Image" src="assets/img/services/service-08.jpg" />
                                        </a>
                                        <div className="fav-btn">
                                            <a href="javascript:void(0)" className="fav-icon">
                                                <i className="fas fa-heart" />
                                            </a>
                                        </div>
                                        <div className="item-info">
                                            <div className="service-user">
                                                <a href="#">
                                                    <img src="assets/img/customer/user-08.jpg" alt />
                                                </a>
                                                <span className="service-price">$75</span>
                                            </div>
                                            <div className="cate-list">
                                                <a className="bg-yellow" href="service-details.html">Construction</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div className="service-content">
                                        <h3 className="title">
                                            <a href="service-details.html">Building Construction Services</a>
                                        </h3>
                                        <div className="rating">
                                            <i className="fas fa-star filled" />
                                            <i className="fas fa-star filled" />
                                            <i className="fas fa-star filled" />
                                            <i className="fas fa-star filled" />
                                            <i className="fas fa-star" />
                                            <span className="d-inline-block average-rating">(4)</span>
                                        </div>
                                        <div className="user-info">
                                            <div className="row">
                                                <span className="col-auto ser-contact"><i className="fas fa-phone me-1" /> <span>xxxxxxxx62</span></span>
                                                <span className="col ser-location"><span>Burr Ridge, Illinois</span>  <i className="fas fa-map-marker-alt ms-1" /></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div className="service-widget">
                                    <div className="service-img">
                                        <a href="service-details.html">
                                            <img className="img-fluid serv-img" alt="Service Image" src="assets/img/services/service-09.jpg" />
                                        </a>
                                        <div className="fav-btn">
                                            <a href="javascript:void(0)" className="fav-icon">
                                                <i className="fas fa-heart" />
                                            </a>
                                        </div>
                                        <div className="item-info">
                                            <div className="service-user">
                                                <a href="#">
                                                    <img src="assets/img/customer/user-09.jpg" alt />
                                                </a>
                                                <span className="service-price">$500</span>
                                            </div>
                                            <div className="cate-list">
                                                <a className="bg-yellow" href="service-details.html">Painting</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div className="service-content">
                                        <h3 className="title">
                                            <a href="service-details.html">Commercial Painting Services</a>
                                        </h3>
                                        <div className="rating">
                                            <i className="fas fa-star filled" />
                                            <i className="fas fa-star filled" />
                                            <i className="fas fa-star filled" />
                                            <i className="fas fa-star" />
                                            <i className="fas fa-star" />
                                            <span className="d-inline-block average-rating">(3)</span>
                                        </div>
                                        <div className="user-info">
                                            <div className="row">
                                                <span className="col-auto ser-contact"><i className="fas fa-phone me-1" /> <span>xxxxxxxx75</span></span>
                                                <span className="col ser-location"><span>Huntsville, Alabama</span>  <i className="fas fa-map-marker-alt ms-1" /></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div className="service-widget">
                                    <div className="service-img">
                                        <a href="service-details.html">
                                            <img className="img-fluid serv-img" alt="Service Image" src="assets/img/services/service-10.jpg" />
                                        </a>
                                        <div className="fav-btn">
                                            <a href="javascript:void(0)" className="fav-icon">
                                                <i className="fas fa-heart" />
                                            </a>
                                        </div>
                                        <div className="item-info">
                                            <div className="service-user">
                                                <a href="#">
                                                    <img src="assets/img/customer/user-10.jpg" alt />
                                                </a>
                                                <span className="service-price">$150</span>
                                            </div>
                                            <div className="cate-list">
                                                <a className="bg-yellow" href="service-details.html">Plumbing</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div className="service-content">
                                        <h3 className="title">
                                            <a href="service-details.html">Plumbing Services</a>
                                        </h3>
                                        <div className="rating">
                                            <i className="fas fa-star filled" />
                                            <i className="fas fa-star filled" />
                                            <i className="fas fa-star filled" />
                                            <i className="fas fa-star" />
                                            <i className="fas fa-star" />
                                            <span className="d-inline-block average-rating">(3)</span>
                                        </div>
                                        <div className="user-info">
                                            <div className="row">
                                                <span className="col-auto ser-contact"><i className="fas fa-phone me-1" /> <span>xxxxxxxx13</span></span>
                                                <span className="col ser-location"><span>Richmond, Virginia</span> <i className="fas fa-map-marker-alt ms-1" /></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    )
}

export default PopularService