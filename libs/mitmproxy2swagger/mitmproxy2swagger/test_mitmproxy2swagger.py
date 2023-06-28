# -*- coding: utf-8 -*-


from .testing_util import get_nested_key, mitmproxy2swagger_e2e_test


def test_mitmproxy2swagger_generates_swagger_from_har():
    data = mitmproxy2swagger_e2e_test(
        "testdata/sklep.lisek.app.har", "https://api2.lisek.app/"
    )
    assert data is not None
    assert "paths" in data
    assert len(data["paths"]) > 3  # check if any paths were generated

    # assert "/api/darkstores" in data["paths"]
    # assert (
    #     "get" in data["paths"]["/api/darkstores"]
    # )  # check if the method was generated


def test_mitmproxy2swagger_generates_swagger_from_mitmproxy_flow_file():
    data = mitmproxy2swagger_e2e_test(
        "testdata/test_flows",
        "https://httpbin.org/",
        [
            "--format",
            "flow",
        ],
    )
    assert data is not None
    assert "paths" in data
    assert len(data["paths"]) == 3  # 4 paths in the test file
    assert get_nested_key(data, "paths./get.get.responses.200.content") is not None


def test_mitmproxy2swagger_generates_swagger_from_mitmproxy_flow_file_with_form_data():
    data = mitmproxy2swagger_e2e_test(
        "testdata/form_data_flows",
        "https://httpbin.org/",
        [
            "--format",
            "flow",
        ],
    )
    assert data is not None

    assert (
        get_nested_key(
            data,
            "paths./post.post.requestBody.content.application/x-www-form-urlencoded.schema",
        )
        is not None
    )


def test_mitmproxy2swagger_generates_headers_for_flow_files():
    data = mitmproxy2swagger_e2e_test(
        "testdata/form_data_flows",
        "https://httpbin.org/",
        [
            "--format",
            "flow",
            "--headers",
        ],
    )
    assert data is not None
    assert (
        get_nested_key(data, "paths./post.post.responses.200.headers.content-type")
        is not None
    )
