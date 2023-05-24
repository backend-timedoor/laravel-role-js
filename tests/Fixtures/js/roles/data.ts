const roles = ["admin","editor"] as const;
const permissions = ["create.user","read.user","update.user","delete.user"] as const;
const rolePermission = {"admin":["create.user","read.user","update.user","delete.user"],"editor":["read.user"]} as const;

export {
  roles,
  permissions,
  rolePermission,
};