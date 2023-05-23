import { permissions, roles } from "./data";

export type RoleType = typeof roles[number];
export type PermissionType = typeof permissions[number];

export interface RolePermission {
  role: RoleType | RoleType[];
  permissions?: PermissionType[];
}
