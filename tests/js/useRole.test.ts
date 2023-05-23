import { describe, expect, it } from "vitest";
import { useRole } from "../../stubs/js/roles";

describe("Role composable", () => {
  it("always false when doesn't have user", () => {
    const { hasRole, hasPermission, hasOnePermission, hasAllPermission } = useRole();

    expect(hasRole("admin")).toBe(false);
    expect(hasPermission("view.users")).toBe(false);
    expect(hasPermission(["view.users", "edit.users"])).toBe(false);
    expect(hasOnePermission("view.users")).toBe(false);
    expect(hasAllPermission(["view.users", "edit.users"])).toBe(false);
  });

  it("user can have one role", () => {
    const { hasRole } = useRole({ role: "admin" });

    expect(hasRole("admin")).toBe(true);
    expect(hasRole("superadmin")).toBe(false);
  });

  it("user can have multiple roles", () => {
    const { hasRole } = useRole({ role: ["admin", "superadmin"] });

    expect(hasRole("admin")).toBe(true);
    expect(hasRole(["admin", "superadmin"])).toBe(true);
    expect(hasRole("superadmin")).toBe(true);
  });

  it("user can have permissions in role", () => {
    const { hasPermission } = useRole({ role: "superadmin" });

    expect(hasPermission("view.users")).toBe(true);
    expect(hasPermission(["view.users", "edit.users"], true)).toBe(true);
  });

  it("user can have zero permissions in role", () => {
    const { hasPermission } = useRole({ role: ["admin", "user"] });

    expect(hasPermission("view.users")).toBe(false);
    expect(hasPermission(["view.users", "edit.users"])).toBe(false);
  });

  it("user can assign a permission", () => {
    const { hasPermission, hasOnePermission } = useRole({ role: "admin", permissions: ["view.users"] });

    expect(hasPermission("view.users")).toBe(true);
    expect(hasPermission("edit.users")).toBe(false);
    expect(hasOnePermission("view.users")).toBe(true);

    expect(hasPermission(["view.users", "edit.users"])).toBe(true);
    expect(hasPermission(["create.users", "edit.users"])).toBe(false);
    expect(hasPermission(["view.users", "edit.users"], true)).toBe(false);
  });
});
