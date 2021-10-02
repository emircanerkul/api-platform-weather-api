import Head from "next/head";
import React from "react";

import { ENTRYPOINT } from "config/entrypoint";

import { Redirect, Route } from "react-router-dom";
import { HydraAdmin, hydraDataProvider as baseHydraDataProvider, fetchHydra as baseFetchHydra, useIntrospection } from "@api-platform/admin";
import parseHydraDocumentation from "@api-platform/api-doc-parser/lib/hydra/parseHydraDocumentation";
import authProvider from "utils/authProvider";
import Login from "components/admin/login";

const getHeaders = () => localStorage.getItem("token") ? {
  Authorization: `Bearer ${localStorage.getItem("token")}`,
} : {};
const fetchHydra = (url, options = {}) =>
  baseFetchHydra(url, {
    ...options,
    headers: getHeaders,
  });
const RedirectToLogin = () => {
  const introspect = useIntrospection();

  if (localStorage.getItem("token")) {
    introspect();
    return <></>;
  }
  return <Redirect to="/login" />;
};
const apiDocumentationParser = async (ENTRYPOINT) => {
  try {
    const { api } = await parseHydraDocumentation(ENTRYPOINT, { headers: getHeaders });
    return { api };
  } catch (result) {
    if (result.status === 401) {
      // Prevent infinite loop if the token is expired
      localStorage.removeItem("token");

      return {
        api: result.api,
        customRoutes: [
          <Route path="/" component={RedirectToLogin} />
        ],
      };
    }

    throw result;
  }
};
const dataProvider = baseHydraDataProvider(ENTRYPOINT, fetchHydra, apiDocumentationParser);

const Admin = () => (
  <HydraAdmin
    dataProvider={ dataProvider }
    authProvider={ authProvider }
    entrypoint={ ENTRYPOINT }
    loginPage={Login}
  />
);

export default Admin;