package br.com.victorblq.domain.entity.personal_info;

import java.util.Set;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.OneToMany;
import javax.validation.constraints.NotEmpty;

import br.com.victorblq.domain.entity.AbstractEntity;
import lombok.Data;
import lombok.EqualsAndHashCode;
import lombok.NoArgsConstructor;

/**
 * 
 * @author Victor Carvalho
 *
 * @version 1.0.0
 * @since 1.0.0, 12/26/2018
 */
@Data
@Entity
@EqualsAndHashCode(callSuper=true)
@NoArgsConstructor
public class PersonalInfo extends AbstractEntity{

	private static final long serialVersionUID = -5614379199994541271L;
	
	@Column(columnDefinition="TEXT")
	private String image;
	@NotEmpty
	@Column(length=30)
	private String title;
	@Column(length=50)
    private String subtitle;
    @NotEmpty
    @Column(length=100)
	private String firstName;
    @Column(length=100)
	private String lastName;
	@Column(columnDefinition="TEXT")
	private String aboutMe;
	@OneToMany
	private Set<Phone> phones;
	@OneToMany
	private Set<Email> emails;
	@OneToMany
	private Set<Reference> references;
}