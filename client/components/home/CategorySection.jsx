import axios from 'axios'
import React, { useEffect, useState } from 'react'

const CategorySection = ({categories}) => {
    

    return (
        <section className="category-section">
            <div className="container">
                <div className="row">
                    <div className="col-lg-12">
                        <div className="row">
                            <div className="col-md-6">
                                <div className="heading aos" data-aos="fade-up" >
                                    <h2>Featured Categories</h2>
                                    <span>What do you need to find?</span>
                                </div>
                            </div>
                            <div className="col-md-6">
                                <div className="viewall aos" data-aos="fade-up" >
                                    <h4><a href="categories.html">View All <i className="fas fa-angle-right" /></a></h4>
                                    <span>Featured Categories</span>
                                </div>
                            </div>
                        </div>
                        <div className="catsec">
                            <div className="row">
                                {categories.map((item,i) => (
                                    <div className="col-lg-4 col-md-6 aos" key={i} data-aos="fade-up" >
                                        <a href="search.html">
                                            <div className="cate-widget " >
                                                <img src={item.image} alt="true" />
                                                <div className="cate-title">
                                                    <h3><span><i className="fas fa-circle" /> {item.name}</span></h3>
                                                </div>
                                                <div className="cate-count">
                                                    <i className="fas fa-clone" /> 21
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                ))}

                                {/* <div className="col-lg-4 col-md-6">
                                    <a href="search.html">
                                        <div className="cate-widget aos" data-aos="fade-up" >
                                            <img src="/assets/img/category/category-02.jpg" alt="true" />
                                            <div className="cate-title">
                                                <h3><span><i className="fas fa-circle" /> Interior</span></h3>
                                            </div>
                                            <div className="cate-count">
                                                <i className="fas fa-clone" /> 15
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div className="col-lg-4 col-md-6">
                                    <a href="search.html">
                                        <div className="cate-widget aos" data-aos="fade-up" >
                                            <img src="/assets/img/category/category-03.jpg" alt="true" />
                                            <div className="cate-title">
                                                <h3><span><i className="fas fa-circle" /> Car Wash</span></h3>
                                            </div>
                                            <div className="cate-count">
                                                <i className="fas fa-clone" /> 15
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div className="col-lg-4 col-md-6">
                                    <a href="search.html">
                                        <div className="cate-widget aos" data-aos="fade-up" >
                                            <img src="/assets/img/category/category-04.jpg" alt="true" />
                                            <div className="cate-title">
                                                <h3><span><i className="fas fa-circle" /> Cleaning</span></h3>
                                            </div>
                                            <div className="cate-count">
                                                <i className="fas fa-clone" /> 14
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div className="col-lg-4 col-md-6">
                                    <a href="search.html">
                                        <div className="cate-widget aos" data-aos="fade-up" >
                                            <img src="/assets/img/category/category-05.jpg" alt="true" />
                                            <div className="cate-title">
                                                <h3><span><i className="fas fa-circle" /> Electrical</span></h3>
                                            </div>
                                            <div className="cate-count">
                                                <i className="fas fa-clone" /> 10
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div className="col-lg-4 col-md-6">
                                    <a href="search.html">
                                        <div className="cate-widget aos" data-aos="fade-up" >
                                            <img src="/assets/img/category/category-06.jpg" alt="true" />
                                            <div className="cate-title">
                                                <h3><span><i className="fas fa-circle" /> Construction</span></h3>
                                            </div>
                                            <div className="cate-count">
                                                <i className="fas fa-clone" /> 8
                                            </div>
                                        </div>
                                    </a>
                                </div> */}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    )
}

export default CategorySection