package br.com.victorblq.domain.entity.user;

import java.util.Collection;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.Transient;
import javax.validation.constraints.NotEmpty;
import javax.validation.constraints.NotNull;

import org.springframework.security.core.GrantedAuthority;
import org.springframework.security.core.userdetails.UserDetails;

import com.fasterxml.jackson.annotation.JsonIgnore;

import br.com.victorblq.domain.entity.AbstractEntity;
import lombok.Data;
import lombok.EqualsAndHashCode;
import lombok.NoArgsConstructor;

/**
 * 
 * @author Victor Carvalho
 *
 * @version 1.0.0
 * @since 1.0.0, 12/19/2018
 */
@Data
@Entity
@EqualsAndHashCode(callSuper = true)
@NoArgsConstructor
public class User extends AbstractEntity implements UserDetails{
	
	private static final long serialVersionUID = -6741152013363378915L;
	
	@NotEmpty
	@Column(nullable = false)
	private String name;
	@NotEmpty
	@Column(nullable = false)
	private String email;
	@NotEmpty
	@Column(nullable = false)
	private String password;
	@NotNull
	@Column(nullable = false)
	private Boolean enabled = true;
	
	
	/*
	 * UserDetails methods
	 */
	@Override
	@JsonIgnore
	@Transient
	public Collection<? extends GrantedAuthority> getAuthorities() {
		return null;
	}
	
	@Override
	@JsonIgnore
	@Transient
	public String getUsername() {
		return this.email;
	}
	
	@Override
	@JsonIgnore
	@Transient
	public boolean isAccountNonExpired() {
		return false;
	}
	
	@Override
	@JsonIgnore
	@Transient
	public boolean isAccountNonLocked() {
		return false;
	}
	
	@Override
	@JsonIgnore
	@Transient
	public boolean isCredentialsNonExpired() {
		return false;
	}
	
	@Override
	@JsonIgnore
	@Transient
	public boolean isEnabled() {
		return this.enabled;
	}
}
