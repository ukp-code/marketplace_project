import React from 'react'

const OurApp = () => {

    return (
        <section className="app-set">
            <div className="container">
                <div className="row align-items-center">
                    <div className="col-lg-6 col-12">
                        <div className="col-md-12">
                            <div className="heading aos" data-aos="fade-up">
                                <h2>Download Our App</h2>
                                <span>Aliquam lorem ante, dapibus in, viverra quis</span>
                            </div>
                        </div>
                        <div className="downlaod-set aos" data-aos="fade-up">
                            <ul>
                                <li>
                                    <a href="#"><img src="/assets/img/gp.png" alt="img" /></a>
                                </li>
                                <li>
                                    <a href="#"><img src="/assets/img/ap.png" alt="img" /></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div className="col-lg-6 col-12">
                        <div className="appimg-set aos" data-aos="fade-up">
                            <img src="/assets/img/app.png" alt="img" />
                        </div>
                    </div>
                </div>
            </div>
        </section>
    )
}

export default OurApp