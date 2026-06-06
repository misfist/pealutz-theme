<?php
/**
 * Title: Content Experience
 * Slug: pealutz/content-experience
 * Description: Experience section with title, divider, and job list.
 * Categories: pealutz
 * Keywords: experience, jobs, work history, section
 */
?>

<!-- wp:query {
    "queryId": 10,
    "query": {
        "perPage": 12,
        "pages": 0,
        "offset": 0,
        "postType": "project",
        "order": "desc",
        "orderBy": "date",
        "author": "",
        "search": "",
        "exclude": [],
        "sticky": "",
        "inherit": false,
        "parents": [],
        "format": [],
        "meta_query": [],
        "taxQuery": {
            "include": {
                "project_type": [
                    41
                ]
            }
        }
    },
    "namespace": "advanced-query-loop",
    "metadata": {
        "categories": [
            "pealutz"
        ],
        "name": "Resume",
        "patternName": "pealutz/content-experience"
    },
    "align": "full",
    "layout": {
        "type": "default"
    }
} -->
<div class="wp-block-query alignfull">
    <!-- wp:post-template {"align":"full","style":{"typography":{"textTransform":"none"}}} -->
    <!-- wp:columns {"className":"job"} -->
    <div class="wp-block-columns job"><!-- wp:column {"width":"30%"} -->
        <div class="wp-block-column" style="flex-basis:30%">
            <!-- wp:group {"metadata":{"name":"Company"},"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
            <div class="wp-block-group">
                 <!-- wp:heading {
                    "level": 4,
                    "metadata": {
                        "bindings": {
                            "content": {
                                "source": "site-functionality/project-company"
                            }
                        },
                        "name": "Company Name"
                    },
                    "className": "job-company"
                } -->
                <h4 class="wp-block-heading job-company"></h4>
                <!-- /wp:heading -->
            </div>
            <!-- /wp:group -->

            <!-- wp:paragraph {
                "metadata": {
                    "bindings": {
                        "content": {
                            "source": "core/post-meta",
                            "args": {
                                "key": "location"
                            }
                        }
                    },
                    "name": "Location"
                },
                "className": "job-location"
            } -->
            <p class="job-location"></p>
            <!-- /wp:paragraph -->

            <!-- wp:group {
                "metadata": {
                    "name": "Dates"
                },
                "className": "job-dates",
                "style": {
                    "spacing": {
                        "blockGap": "var:preset|spacing|20"
                    }
                },
                "layout": {
                    "type": "flex",
                    "flexWrap": "wrap"
                }
            } -->
            <div class="wp-block-group job-dates">
                 <!-- wp:paragraph {
                    "metadata": {
                        "bindings": {
                            "content": {
                                "source": "site-functionality/project-date",
                                "args": {
                                    "key": "start_date"
                                }
                            }
                        },
                        "name": "Start Date"
                    },
                    "className": "start-date"
                } -->
                <p class="start-date"></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"className":"separator"} -->
                <p class="separator">to</p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {
                    "metadata": {
                        "bindings": {
                            "content": {
                                "source": "site-functionality/project-date",
                                "args": {
                                    "key": "end_date"
                                }
                            }
                        },
                        "name": "End Date"
                    },
                    "className": "end-date"
                } -->
                <p class="end-date"></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"width":""} -->
        <div class="wp-block-column">
            <!-- wp:post-title {"level":5,"className":"job-title"} /-->

            <!-- wp:post-content {"className":"job-description"} /-->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
    <!-- /wp:post-template -->
</div>
<!-- /wp:query -->