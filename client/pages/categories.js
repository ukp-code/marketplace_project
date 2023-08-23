import React from 'react'
import Layout from './layout'

const Categories = () => {
    return (
        <Layout>
            <div className="breadcrumb-bar">
                <div className="container">
                    <div className="row">
                        <div className="col">
                            <div className="breadcrumb-title">
                                <h2>Categories</h2>
                            </div>
                        </div>
                        <div className="col-auto float-end ms-auto breadcrumb-menu">
                            <nav aria-label="breadcrumb" className="page-breadcrumb">
                                <ol className="breadcrumb">
                                    <li className="breadcrumb-item">
                                        <a href="index.html">Home</a>
                                    </li>
                                    <li className="breadcrumb-item active" aria-current="page">Categories</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            {/* /Breadcrumb */}
            <div className="content">
                <div className="container">
                    <div className="catsec clearfix">
                        <div className="row">
                            <div className="col-lg-4 col-md-6">
                                <a href="search.html">
                                    <div className="cate-widget">
                                        <img src="/assets/img/category/category-01.jpg" alt />
                                        <div className="cate-title">
                                            <h3><span><i className="fas fa-circle" /> Computer</span></h3>
                                        </div>
                                        <div className="cate-count">
                                            <i className="fas fa-clone" /> 21
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div className="col-lg-4 col-md-6">
                                <a href="search.html">
                                    <div className="cate-widget">
                                        <img src="/assets/img/category/category-02.jpg" alt />
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
                                    <div className="cate-widget">
                                        <img src="/assets/img/category/category-03.jpg" alt />
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
                                    <div className="cate-widget">
                                        <img src="/assets/img/category/category-04.jpg" alt />
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
                                    <div className="cate-widget">
                                        <img src="/assets/img/category/category-05.jpg" alt />
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
                                    <div className="cate-widget">
                                        <img src="/assets/img/category/category-06.jpg" alt />
                                        <div className="cate-title">
                                            <h3><span><i className="fas fa-circle" /> Construction</span></h3>
                                        </div>
                                        <div className="cate-count">
                                            <i className="fas fa-clone" /> 8
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div className="col-lg-4 col-md-6">
                                <a href="search.html">
                                    <div className="cate-widget">
                                        <img src="/assets/img/category/category-07.jpg" alt />
                                        <div className="cate-title">
                                            <h3><span><i className="fas fa-circle" /> Plumbing</span></h3>
                                        </div>
                                        <div className="cate-count">
                                            <i className="fas fa-clone" /> 18
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div className="col-lg-4 col-md-6">
                                <a href="search.html">
                                    <div className="cate-widget">
                                        <img src="/assets/img/category/category-08.jpg" alt />
                                        <div className="cate-title">
                                            <h3><span><i className="fas fa-circle" /> Carpentry</span></h3>
                                        </div>
                                        <div className="cate-count">
                                            <i className="fas fa-clone" /> 32
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div className="col-lg-4 col-md-6">
                                <a href="search.html">
                                    <div className="cate-widget">
                                        <img src="/assets/img/category/category-09.jpg" alt />
                                        <div className="cate-title">
                                            <h3><span><i className="fas fa-circle" /> Appliance</span></h3>
                                        </div>
                                        <div className="cate-count">
                                            <i className="fas fa-clone" /> 19
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div className="pagination">
                            <ul>
                                <li className="active"><a href="javascript:void(0);">1</a></li>
                                <li><a href="javascript:void(0);">2</a></li>
                                <li><a href="javascript:void(0);">3</a></li>
                                <li><a href="javascript:void(0);">4</a></li>
                                <li className="arrow"><a href="javascript:void(0);"><i className="fas fa-angle-right" /></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </Layout>
    )
}

export default Categories