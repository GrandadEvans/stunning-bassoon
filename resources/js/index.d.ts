export {};

declare global {
  interface Window {
    _: any,
    axios: any; // 👈️ turn off type checking
  };

  interface ImportMeta {
    glob: any;
  };

  interface createInertiaAppProps {
    setup: any
  }
}
